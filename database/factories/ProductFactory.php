<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->words(3, true),
            'description' => $this->faker->text(100),
            'price' => $this->faker->randomFloat(2, 1, 10000),
            'sku' => $this->faker->unique()->uuid(),
            'stock_amount' => $this->faker->randomNumber(4),
            'client_id' => Client::inRandomOrder()->first()->id,
        ];
    }
}
