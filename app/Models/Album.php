<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'photographer_id',
        'album_name'
    ];

    public function photographer()
    {
        return $this->belongsTo('App\Models\Photographer');
    }
    public function photos()
    {
        return $this->hasMany('\App\Models\Photo');
    }
}
