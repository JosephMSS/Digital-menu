<?php

namespace Tests\Unit\app\Models;

use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
}
