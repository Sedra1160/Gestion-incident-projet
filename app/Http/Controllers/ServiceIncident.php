<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Incident;
use Illuminate\Http\Request;
use DB;

class ServiceIncident extends Controller
{
        public  function incidents(){
            $incidents = DB::select("select * from incident");
            return response()->json($incidents);
        }
        public function modifierStatut($id){
            $date = date('d-m-y h:i:s');
            return DB::table('incident')
            ->where("id",$id)
            ->update([
                "etat"=>1,
                "datefin"=>$date
            ]);
        }
}