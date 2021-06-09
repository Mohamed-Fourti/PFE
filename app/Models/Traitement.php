<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Traitement extends Model
{
  use HasFactory, Notifiable;

    protected $table="traitements";
    protected $fillable = [
      'hardware',
      'software',
      'résultat',
      'technicien_id',
      'réclamation_id',
      'cause',
  ];

    public function setHardwareAttribute($value)
    {
        $this->attributes['hardware'] = json_encode($value);
    }


    public function technicien()
    {
      return $this->belongsTo(User::class);
    }

    public function réclamation()
    {
      return $this->belongsTo(Réclamation::class);
    }
}

