<?php

namespace Tests\Unit\app\Models;

use App\Models\Category;
use App\Models\Food;
use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FoodTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_belongs_to_user()
    {
        $food=Food::factory()->create();
        $this->assertInstanceOf(User::class,$food->user);
    }
    public function test_belongs_to_many_ingredients()
    {
        $food=Food::factory()->create();
        $ingredient=Ingredient::factory()->create();
        
        $food->ingredients()->attach(['food_id'=>$food->id,'ingredient_id'=>$ingredient->id]);
        
        $this->assertInstanceOf(Ingredient::class,$food->ingredients->first());
        /**
         * Extraemos un ingrediente por medio de la 
         * relacion y asi nos aseguramos que no 
         * extraemos una instancia de 
         * Eloquent\Collection
         */
    }
    public function test_belongs_to_category()
    {
        $category=Category::factory()->create();
        $food=Food::factory()->create(['category_id'=>$category->id]);
              
        $this->assertInstanceOf(Category::class,$food->category);
       
    }
}
