<?php

namespace Database\Factories;

use App\Models\Library;
use Illuminate\Database\Eloquent\Factories\Factory;

class LibraryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Library::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

                'nation' => $this->faker->country(),
                'city' => $this->faker->city(),
                'library' => $this->faker->company(),
                'lat' => $this->faker->latitude($min = -90, $max = 90),
                'lng' => $this->faker->longitude($min = -180, $max = 180),
                'quantity' => $this->faker->numberBetween($min = 1000, $max = 9000),
                'website' => $this->faker->url(),
                'copyright' => $this->faker->sentence(),
                'is_free_cultural_works_license' => $this->faker->boolean(),
                'notes' => $this->faker->sentence(),
                'IIIF' => $this->faker->boolean(),
                'has_post' => $this->faker->boolean(),
                'post_url' => $this->faker->url()
        ];
    }
}
