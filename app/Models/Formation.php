<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Formateur;
use App\Models\Matiere;
use App\Models\Groupe;
use App\Models\Description_Formation;

class Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_formation',
        'frais_inscription',
        'frais_formation',
        'frais_examan_final',
        'duree_formation',
    ];

    public function Etudiants(){
        return $this->hasMany(Etudiant::class, 'formation_id', 'id');
    }

    public function Formateurs(){
        return $this->hasMany(Formateur::class, 'formation_id', 'id');
    }

    public function Description_Formations(){
        return $this->hasMany(Description_Formation::class, 'formation_id', 'id');
    }

    public function Groupes(){
        return $this->hasMany(Groupe::class, 'formation_id', 'id');
    }

    public function Matieres(){
        return $this->hasMany(Matiere::class, 'formation_id', 'id');
    }
}
