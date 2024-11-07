<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'username' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->email(),
            'password' => bcrypt('123'),
            'dob' => $this->faker->date(),
            'number' => $this->faker->unique()->phoneNumber(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}