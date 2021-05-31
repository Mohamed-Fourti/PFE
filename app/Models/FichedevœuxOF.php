<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichedevœuxOF extends Model
{
    use HasFactory;
    protected $fillable = [
        'sem',
        'active'
    ];

    
    public function Fichedevœux()
    {
        return $this->hasMany(Fichedevœux::class);
    }
}
