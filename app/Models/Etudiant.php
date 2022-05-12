<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;
use App\Models\Batiment;
use App\Models\Groupe;
use App\Models\Payement;
use App\Models\Parent_Etudiant;

class Etudiant extends Model
{   
    use HasFactory;
    protected $fillable = [
        'code',
        'nom',
        'prenom',
        'date_naissance',
        'niveau_scolaire',
        'numero_telephone',
        'adresse',
        'ville',
        'code_postale',
        'formation_id',
        'batiment_id',
    ];

    public function Parent_Etudiant(){
        return $this->hasMany(Parent_Etudiant::class, 'etudiant_id', 'id');
    }

    public function Classes(){
        return $this->hasMany(Classe::class, 'etudiant_id', 'id');
    }

    public function Payement(){
        return $this->hasMany(Payement::class, 'etudiant_id', 'id');
    }

    public function Formation(){
        return $this->belongsTo(Formation::class);
    }

    public function Batiment(){
        return $this->belongsTo(Batiment::class);
    }
}
