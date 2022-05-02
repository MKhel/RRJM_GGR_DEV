<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes extends Model
{
    use HasFactory;
    protected $fillable = [
        'class_name',
        'target_number'
      ];
    public function applicant() {
        return $this->hasMany(Applicant::class, 'class_name', 'class_name' );
    }
}
