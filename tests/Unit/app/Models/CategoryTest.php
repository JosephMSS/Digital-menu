<?php

namespace Tests\Unit\app\Models;

use App\Models\Category;
use App\Models\Food;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
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
       $category=Category::factory()->create(['user_id'=>$user->id]);
       $this->assertInstanceOf(User::class,$category->user);
    }
    public function test_has_many_foods()
    {
        $category=Category::factory()->create();
        $food=Food::factory()->create(['category_id'=>$category->id]);

        $this->assertInstanceOf(Collection::class,$category->foods);
        
        $this->assertInstanceOf(Food::class,$category->foods->first());

    }
}
