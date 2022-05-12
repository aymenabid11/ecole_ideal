<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batiment;

class Salle extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_salle',
        'numero_salle',
        'type_salle',
        'batiment_id',
    ];

    public function Batiment(){
        return $this->belongsTo(Batiment::class);
    }
}
