<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->words(rand(1, 5), true)),
            'director' => $this->faker->name(),
            'imageUrl' => "https://blog.hubspot.com/hubfs/Sales_Blog/famous-movie-quotes.jpg",
            'duration' => $this->faker->numberBetween(60, 300),
            'releaseDate' => $this->faker->date(),
            'genre' =>  ucfirst($this->faker->word())
        ];
    }
}
