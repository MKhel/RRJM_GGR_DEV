<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sn_number',
        'app_img',
        'class_name',
        'first_name',
        'middle_name',
        'last_name',
        'contact_number',
        'contact_number',
        'email_address',
        'home_address',
        'city',
        'province',
        'zip_code',
      ];


    // public function user() {
    //     return $this->belongsTo(\App\Models\User::class, "user_id");
    // }
}
