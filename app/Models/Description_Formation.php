<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;

class Description_Formation extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'Text_slider',
        'avatar',
        'formation_id',
    ];
    
    public function Formation(){
        return $this->belongsTo(Formation::class);
    }
}
