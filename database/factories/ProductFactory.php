<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'=> $this->faker->numberBetween(1,10),
            'brand_id'=> $this->faker->numberBetween(1,10),
            'name' => $this->faker->unique()->userName(),
            'slug' => $this->faker->unique()->userName(),
            'price'=>$this->faker->numberBetween(100,5000),
            'discount'=>$this->faker->numberBetween(2,10),
            'description' => $this->faker->paragraph(),
            'image' => $this->faker->imageUrl(),
            'stock'=>$this->faker->numberBetween(50,200),
        ];
    }
}
