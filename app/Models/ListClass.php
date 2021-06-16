<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListClass extends Model
{
    use HasFactory;
    protected $fillable = [
        'class',
    ];

    public function TableauAffichage()
    {
        return $this->hasMany(TableauAffichage::class);
    }

    public function Emploitemp()
    {
        return $this->hasMany(Emploi_temp::class);
    }
}
