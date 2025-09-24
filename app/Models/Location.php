<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'address',
        'suburb',
        'postcode',
        'state_id',
        'latitude',
        'longitude',
        'region'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
