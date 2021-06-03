<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtuMat extends Model
{
    use HasFactory;
    protected $fillable = [
        'département',
        'class',
        'name',
        'file_path',
        'sem',
    ];

    public function publication(){
        return $this->hasMany(Publication::class);
      }
}
