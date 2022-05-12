<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;


class Formateur extends Model
{
    use HasFactory;
    protected $fillable = [
        'CIN',
        'nom',
        'prenom',
        'date_naissance',
        'Diplome',
        'numero_telephone',
        'adresse',
        'ville',
        'code_postale',
        'formation_id',
    ];

    public function Formation(){
        return $this->belongsTo(Formation::class);
    }
}
