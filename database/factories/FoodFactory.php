<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Food;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Food::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::factory(),
            'category_id'=>Category::factory(),
            'name'=>$this->faker->title,
            'slug'=>$this->faker->slug,
            'image'=>$this->faker->imageUrl(1280,720),
            'description'=>$this->faker->text(800),
        ];
    }
}
