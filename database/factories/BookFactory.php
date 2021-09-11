<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // O campo titulo vai receber palavras aleatorias
        'name' => $this->faker->sentence(4),
        // O campo paginas vai receber um numero aleatorio
       
        // O campo author vai receber algum nome aleatorio
        'author' => $this->faker->name

        ];
    }
}
