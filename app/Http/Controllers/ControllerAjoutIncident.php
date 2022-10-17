<?php

namespace App\Http\Controllers;

use App\Models\TypeIncident;
use App\Models\Intervenant;
use App\Models\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerAjoutIncident extends Controller
{
        public static function index(){
            $typeIncidents = TypeIncident::all();
            $intervenants = Intervenant::all();
            return view('ajoutIncident',compact('typeIncidents','intervenants'));
        }
        public function ajout(Request $req){
            $dateNow =date('d-m-y h:i:s');
            $dateResolu=date('01-01-1900');
            DB::table('incident')->insert([
                "nom"=>$req->nom,
                "idtypeincident"=>$req->type,
                "idintervenant"=>$req->intervenant,
                "commentaire"=>$req->commentaire,
                "dateincident"=>$dateNow,
                "etat"=>0,
                "archive"=>0
            ]);
            // Incident::create([
            //     "nom"=>$req->nom,
            //     "idTypeIncident"=>$req->type,
            //     "idIntervenant"=>$req->intervenant,
            //     "commentaire"=>$req->commentaire,
            //     "dateIncident"=>$dateNow,
            //     "dateResolu"=>$dateResolu
            // ]);
            return back()->with("success","votre incident est enregistré");
        }
        public function modifier(Request $req,$id){
            // $requetSql = "update incidents set nom = '".$req->nom."',idTypeIncident = '".$req->type."',idIntervenant = '".$req->intervenant."',commentaire = '".$req->commentaire."' where id =".$id."";
            // DB::update($requetSql);
            DB::table('incident')
            ->where("id",$id)
            ->update([
                'nom'=>$req->nom,
                'idtypeincident'=>$req->type,
                'idintervenant'=>$req->intervenant,
                'commentaire'=>$req->commentaire
            ]);
          return back()->with("success","Incident modifié avec succè !");
        }
}