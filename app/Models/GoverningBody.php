<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoverningBody extends Model
{
    use HasFactory;

    protected $fillable = ['body_name', 'contact_email', 'website'];

    public function schools()
    {
        return $this->hasMany(School::class, 'governing_body_id');
    }
}
