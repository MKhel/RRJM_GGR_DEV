<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminpanel extends Model
{
    use HasFactory;
    protected $fillable = [
        'new_status',
        'user_id',
        'user_name',
      ];
}
