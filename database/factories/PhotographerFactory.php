<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Photographer;
use Illuminate\Support\Str;

class PhotographerFactory extends Factory
{
    protected $model = Photographer::class; 

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->numerify('##########'),
            'email' => $this->faker->email(),
            'bio' => $this->faker->text()
        ];
    }
}
