<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
class Applicant extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = "applicants";
    protected $fillable = [
        'user_id',
        'sn_number',
        'app_img',
        'class_name',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'contact_number',
        'email_address',
        'birthdate',
        'home_address',
        'city',
        'province',
        'country',
        'zip_code',
        'status',
        'abroad_address',
      ];


    public function useractivities()
    {
        return $this->hasMany(UserActivities::class, 'applicant_id', 'id');
        //return $this->hasMany(User::class, "id", auth()->user()->id)->where('user_id', auth()->user()->id);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function applicantCount()
    {
        return $this->hasMany(Classes::class, 'class_name', 'class_name');
    }
}
