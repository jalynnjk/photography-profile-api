<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album;
use Illuminate\Support\Str;

class AlbumFactory extends Factory
{
    protected $model = Album::class;

    public function definition()
    {
        return [
            'photographer_id' => 1,
            'album_name' => $this->faker->name()
        ];
    }
}
