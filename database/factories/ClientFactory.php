<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'document' => $this->faker->unique()->cpf(false),
            'document_type' => 'cpf',
            'full_name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumberCleared(),
            'user_id' => User::factory()
        ];
    }
}
