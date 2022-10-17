<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdministrateurController extends Controller
{
    public static function index(){
        return view('login');
    }
    public function valide(Request $req){
        $admin = DB::select("select * from administrateur where email=? and mdp=md5(?) ",[$req->email,$req->mdp]);
        $utilisateur = DB::select("select * from intervenants where email = ? and mdp = ?",[$req->email,$req->mdp]);
        if($admin == null && $utilisateur == null)return view('login',['erreur'=>'mot de passe ou email incorrecte !']);
        if(count($admin) !=0){
            session(['admin'=>$admin]);
            session(['nomAdmin'=>$admin[0]->nom]);
            return ControllerListeIncident::index();  
        }
        if(count($utilisateur) != 0){
            session(['utilisateur'=>$utilisateur]);
            session(['nomUtilisateur'=>$utilisateur[0]->nom]);
            return ControllerListeIncident::incidentUtilisateur();
        }
    }
    public function deconnexion(){
        session()->forget('admin');
        session()->forget('nomAdmin');
        return $this->index();
    }
    public function deconnexionUtilisateur(){
        session()->forget('utilisateur');
        session()->forget('nomUtilisateur');
        return $this->index();  
    }
}
