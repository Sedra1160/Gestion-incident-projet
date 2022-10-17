<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incident;

class Intervenant extends Model
{
    use HasFactory;

    protected $fillable = ["matricule","nom","prenom","email","photo","mdp"];

    public function incidents(){
        return $this->hasMany(Incident::class);
    }
}
