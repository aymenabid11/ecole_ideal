<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Groupe;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = [
        'etudiant_id',
        'groupe',
    ];

    public function Etudiants(){
        return $this->belongsTo(Etudiant::class);
    }

    public function Groupes(){
        return $this->belongsTo(Groupe::class);
    }
}
