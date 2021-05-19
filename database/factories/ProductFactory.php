<?php

namespace Database\Factories;

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
    // 'name', 'description', 'price', 'image',
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraphs(5),
            'price' => $this->faker->randomFloat(2, $min = 20),
            'image' => $this->faker->image('public/storage', 640, 480),
        ];
    }
}
