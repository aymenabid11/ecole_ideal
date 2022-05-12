<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class Payement extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_payement',
        'num_tranche',
        'montant',
        'etudiant_id',
    ];

    public function Etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
}
