<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enrolment extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'year',
        'total_students',
        'male_students',
        'female_students',
        'total_staff'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
