<?php

namespace App\Http\Controllers;

use App\Models\TypeIncident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerTypeIncident extends Controller
{
        public static function index(){
            if(session('admin')==false)return AdministrateurController::index();
            $type_incidents = DB::select('select * from type_incidents where supprimer = 0');
            return view('typeIncident',compact("type_incidents"));
        }
        
        public function ajout(Request $req){
            DB::table('type_incidents')
            ->insert([
                "nom"=>$req->nom,
                "supprimer"=>0
            ]);

            return back()->with("success","type d'incident ajouté avec succè !");
        }
        public function supprimer($id){
            DB::table('type_incidents')
            ->where("id",$id)
            ->update([
                "supprimer"=>1
            ]);
            return back()->with("success","type d'incident supprimé avec succè !");
        }

}