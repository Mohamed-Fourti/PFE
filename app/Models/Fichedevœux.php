<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichedevœux extends Model
{
    use HasFactory;
    protected $fillable = [
        'Matieres',
        'sem',
        'gsm',
        'chargeS1',
        'chargeS2',
        'jours',
        'user_id',
    ];

    public function FichedevœuxOF()
    {
        return $this->belongsTo(FichedevœuxOF::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
