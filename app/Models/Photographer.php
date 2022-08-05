<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'bio',
        'profile_picture'
    ];

    public function albums()
    {
        return $this->hasMany('App\Models\Album');
    }
}
