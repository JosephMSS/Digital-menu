<?php

namespace Tests\Unit\app\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_has_many_foods()
    {
        $user=new User();
        
        $this->assertInstanceOf(Collection::class,$user->foods);
    }
    public function test_has_many_ingredients()
    {
        $user=new User();
        
        $this->assertInstanceOf(Collection::class,$user->ingredients);
    }
}
