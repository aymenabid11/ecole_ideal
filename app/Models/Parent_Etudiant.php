<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class Parent_Etudiant extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'numero_telephone',
        'etudiant_id'
    ];

    public function Etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
}
