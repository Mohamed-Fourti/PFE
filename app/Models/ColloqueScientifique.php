<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColloqueScientifique extends Model
{
    public $timestamps = true;

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
