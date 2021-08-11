<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportDuCours extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'class',
        'remarques',
        'title',
        'slug',
        'seo_title',
        'excerpt',
        'body',
        'meta_description',
        'meta_keywords',
        'active',
        'image',
        'categories_id',
        'date_début',
        'date_finale',
        'lieu',
        'formateur',
        'durée',
        'Nbseance',
        'class',
        'file_name',
        'file_path',
    ];
}
