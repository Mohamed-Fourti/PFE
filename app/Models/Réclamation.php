<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Réclamation extends Model
{
    protected $table="Réclamations";
    protected $fillable=[
      'matiére',
      'séance',
      'labo',
      'propriétés',
      'remarques',
      'priorite',
      'etat',
      'user_id',
    ];
    
    protected $casts = [
        'propriétés' => 'array',
        ];


    public function user(){
      return $this->belongsTo(User::class);
    }

    public function traitements(){
      return $this->hasMany(Traitement::class);
    }
}
