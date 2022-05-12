<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;
use App\Models\Etudiant;
use App\Models\Classe;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_groupe',
        'etudiant_id',
        'formation_id',
    ];

    public function Formation(){
        return $this->belongsTo(Formation::class);
    }
    public function Classes(){
        return $this->hasMany(Classe::class, 'etudiant_id', 'id');
    }
    public function Etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
}
