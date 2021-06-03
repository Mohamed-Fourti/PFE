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
        'remarques',
        'jours1',
        'jours2',
        'user_id',
    ];
    protected $casts = [
        'Matieres' => 'array',
        'jours1' => 'array',
        'jours2' => 'array',
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
