<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emploi_temp extends Model
{
    use HasFactory;
    protected $fillable = [
        'list_classe_id',
        'file_name',
        'file_path',
    ];

    public function ListClass()
    {
        return $this->belongsTo(ListClass::class, 'list_classe_id');
    }
}
