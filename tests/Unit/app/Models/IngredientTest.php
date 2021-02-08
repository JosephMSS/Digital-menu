<?php

namespace Tests\Unit\app\Models;

use App\Models\Food;
use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PhpParser\ErrorHandler\Collecting;
use Tests\TestCase;

class IngredientTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_belongs_to_user()
    {
        $user=User::factory()->create();
        $ingredient=Ingredient::factory()->create(['user_id'=>$user->id]);

        $this->assertInstanceOf(User::class,$ingredient->user);
    }
    public function test_belongs_to_many_foods()
    {
        $ingredient=Ingredient::factory()->create();
        $food=Food::factory()->create();
        $ingredient->foods()->attach(['food_id'=>$food->id]);
        $this->assertInstanceOf(Food::class,$ingredient->foods->first());
        $this->assertInstanceOf(Collection::class,$ingredient->foods);
    }
}
