<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolSector extends Model
{
    use HasFactory;

    protected $fillable = ['sector_name'];

    public function schools()
    {
        return $this->hasMany(School::class, 'sector_id');
    }
}
