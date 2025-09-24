<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;

    protected $fillable = ['program_name', 'description'];

    public function schools()
    {
        return $this->belongsToMany(School::class, 'school_programs');
    }
}
