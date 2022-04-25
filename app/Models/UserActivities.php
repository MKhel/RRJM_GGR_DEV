<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivities extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name',
        'particular',
        'remarks',
        'user_id',
        'role_id',
        'applicant_id'
      ];
}
