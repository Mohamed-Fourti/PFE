<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColloqueScientifique extends Model
{
    use HasFactory;
    protected $fillable = [
        'الصفة',
        'الأختصاص',
        'الندوة',
        'من',
        'إلى',
        'بيان',
        'مقدار',
        'الجهة',
        'nom',
        'user_id'

    ];
}
