<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [
      'publications_id',
      'user_id',
      'INFComplémentaires',
  ];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function Publication()
  {
      return $this->belongsTo(Publication::class, 'publications_id');
  }
}
