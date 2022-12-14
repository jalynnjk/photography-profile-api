<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'title',
        'description',
        'img',
        'date',
        'featured',
    ];

    public function album()
    {
        return $this->belongsTo('App\Models\Album');
    }
}
