<?php

namespace App\Http\Controllers;

use App\Models\Intervenant;
use Illuminate\Http\Request;
use DB;

class ControllerListeIntervenant extends Controller
{
        public static function index(){
            if(session('admin')==false)return AdministrateurController::index();
            $intervenants = Intervenant::orderBy("nom","asc")->get();
            return view('listeIntervenant',compact("intervenants"));
        }
        public function fiche($id){
            if(session('admin')==false)return AdministrateurController::index();
            $intervenant = DB::select('select * from intervenants where id = ?',[$id]);
            return view('ficheIntervenant',['intervenant'=>$intervenant]);
        }
        public function supprimer(Intervenant $intervenant){
            if(session('admin')==false)return AdministrateurController::index();
            $intervenant->delete();
            return back()->with("success","type d'incident supprimé avec succè !");
        }
        public function edit($id){
            if(session('admin')==false)return AdministrateurController::index();
            $intervenant = DB::select('select * from intervenants where id = ?',[$id]);
            return view('modifierIntervenant',compact('intervenant'));
        }
}