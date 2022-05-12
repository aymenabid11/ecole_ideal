<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Salle;

class Batiment extends Model
{
    use HasFactory;

    protected $fillable = [
        'gouvernant',
        'ville',
        'adresse',
    ];

    public function Etudiants(){
        return $this->hasMany(Etudiant::class, 'batiment_id', 'id');
    }

    public function Salles(){
        return $this->hasMany(Salle::class, 'batiment_id', 'id');
    }
}
