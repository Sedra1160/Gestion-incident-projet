<?php

namespace App\Http\Controllers;

use App\Models\Intervenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerAjoutProjet extends Controller
{
        public static function index(){
            if(session('admin')==false)return AdministrateurController::index();
            $priorites = DB::select("select * from Priorite");
            $statuts = DB::select("select * from Statut");
            $intervenants = DB::select('select * from intervenants ');
            return view('ajoutProjet',compact('priorites','statuts','intervenants'));
        }
        public function ajout(Request $req){
            if($req->dateDebut > $req->dateFin){
                return back()->with("erreur","Date incohérent !");
            }
            else{
                DB::table('projet')->insert([
                    "nom"=>$req->nom,
                    "dependance"=> $req->dependance,
                    "description"=> $req->description,
                    "idpriorite"=> $req->priorite,
                    "idintervenant"=> $req->intervenant,
                    "datedebut"=> $req->dateDebut,
                    "datefin"=> $req->dateFin,
                    "idstatut"=> $req->statut,
                    "observation"=>$req->observation,
                    "archive"=>0,
                    "supprimer"=>0
                    // "fournisseur"=>'null'
                ]);
                return back()->with("success","Projet ajouté avec succè !");
            }
        }
        public function modifier(Request $req,$id){           
            if($req->dateDebut > $req->dateFin){
                return back()->with("erreur","Date incohérent !");
            }
            else{
                DB::table('projet')
                ->where("id",$id)
                ->update([
                    "nom"=>$req->nom,
                    "dependance"=> $req->dependance,
                    "description"=> $req->description,
                    "idpriorite"=> $req->priorite,
                    "idintervenant"=> $req->intervenant,
                    "datedebut"=> $req->dateDebut,
                    "datefin"=> $req->dateFin,
                    "idstatut"=> $req->statut,
                    "observation"=>$req->observation,
                    "archive"=>0,
                    "supprimer"=>0
                    // "fournisseur"=>'null'
                ]);
                return back()->with("success","Projet modifié avec succè !");
            }
        }
}