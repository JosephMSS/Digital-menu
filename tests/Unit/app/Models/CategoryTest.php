<?php

namespace Tests\Unit\app\Models;

use App\Models\Category;
use App\Models\User;
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
}
