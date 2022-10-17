<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Incident;
use Illuminate\Http\Request;
use DB;

class ServiceProjet extends Controller
{
        public  function projets(){
            $projets = DB::select("select * from projet");
            return response()->json($projets);
        }
        public function accpeterProjet($id){
            return DB::table('projet')
            ->where("id",$id)
            ->update([
                "idstatut"=>2
            ]);
        }
        public function ajoutFournisseur(Request $req,$id){
            return DB::table('projet')
            ->where("id",$id)
            ->update([
                "fournisseur"=>$req->fournisseur
            ]);
        }
}