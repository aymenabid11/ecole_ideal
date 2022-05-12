<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;


class Matiere extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_matiere',
        'coef',
        'formation_id',
    ];

    public function Formation(){
        return $this->belongsTo(Formation::class);
    }
}
