<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dimensions = [
            '800x600',
            '1024x768',
            '1280x720',
            '1920x1080',
            '400x400',
            '500x500'
        ];

        return [
            'image' => 'image_' . $this->faker->unique()->numberBetween(1, 1000) . '.jpg',
            'size' => $this->faker->randomElement($dimensions),
        ];
    }
}