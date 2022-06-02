<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Applicant;

class UserActivities extends Model
{
    use HasFactory;
    protected $table = "user_activities";
    protected $fillable = [
        'user_name',
        'particular',
        'remarks',
        'user_id',
        'role_id',
        'applicant_id'
      ];
    
    public function applicant()
    {
      return $this->hasMany(Applicant::class, 'id', 'applicant_id');
    }
    public function Applicants()
    {
        return $this->hasMany(Applicant::class, 'id', 'applicant_id');
    }
}
