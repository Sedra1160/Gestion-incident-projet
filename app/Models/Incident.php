<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeIncident;
use App\Models\Intervenant;
use DB;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = ["nom","idTypeIncident","idIntervenant","commentaire","dateIncident","dateResolu"];

    public function typeIncident(){
        return $this->belongsTo(TypeIncident::class,'idTypeIncident');
    }
    public function intervenant(){
        return $this->belongsTo(Intervenant::class,'idIntervenant');
    }
    public static function incidentNonResolu(){
        $req = 'select * from incidents';
        $incidents = DB::select($req);
        return $incidents;
    }
}
