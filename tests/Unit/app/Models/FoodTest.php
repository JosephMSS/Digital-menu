<?php

namespace Tests\Unit\app\Models;

use App\Models\Food;
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
}
