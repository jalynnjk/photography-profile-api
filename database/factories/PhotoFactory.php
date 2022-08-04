<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Photo;
use Illuminate\Support\Str;

class PhotoFactory extends Factory
{
    protected $model = Photo::class;

    public function definition()
    {
        return [
            'album_id' => 1,
            'title' => $this->faker->text(),
            'description' => $this->faker->text(),
            'img' => $this->faker->text(),
            'date' => $this->faker->date()
        ];
    }
}
