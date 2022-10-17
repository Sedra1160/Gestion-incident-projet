<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Incident;

class TypeIncident extends Model
{
    use HasFactory;

    protected $fillable = ["nom"];

    public function incidents(){
        return $this->hasMany(Incident::class);
    }
}
