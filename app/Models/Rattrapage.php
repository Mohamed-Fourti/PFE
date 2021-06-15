<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rattrapage extends Model
{
    use HasFactory;


    protected $table="rattrapages";
    protected $fillable=[
        'matiere',
        'classe',
        'motifRemplace',
        'jour1',
        'seance1',
        'jour2',
        'seance2',
        'salle',
        'user_id',
      ];


    public function user(){
        return $this->belongsTo(User::class);
      }
}
