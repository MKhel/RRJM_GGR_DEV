<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $fillable = [
        'announcement_post',
        'posted_by',
      ];
      public function user()
      {
          return $this->hasMany(User::class, 'name', 'posted_by');
      }
}

