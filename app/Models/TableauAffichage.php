<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableauAffichage extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'list_classe_id',
        'remarques',
        'file_name',
        'file_path',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function ListClass()
    {
        return $this->belongsTo(ListClass::class,'list_classe_id');
    }
}
