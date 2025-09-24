<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'official_name',
        'common_name',
        'sector_id',
        'type_id',
        'governing_body_id',
        'established_year',
        'website',
        'contact_email',
        'contact_phone',
    ];

    public function sector()
    {
        return $this->belongsTo(SchoolSector::class, 'sector_id');
    }

    public function type()
    {
        return $this->belongsTo(SchoolType::class, 'type_id');
    }

    public function governingBody()
    {
        return $this->belongsTo(GoverningBody::class, 'governing_body_id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }

    public function programs()
    {
        return $this->belongsToMany(Program::class, 'school_programs');
    }
}
