<?php

namespace Tests\Feature\app\Http\Livewire\Category;

use App\Http\Livewire\Category\CategoryComponent;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CategoryComponentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_store()
    {
        $category=Category::factory()->make();
        Livewire::test(CategoryComponent::class)
        ->set(['name'=>$category->name,'user_id'=>$category->user->id])
        ->call('store');
        // ->assertSee('Edit category');
        $this->assertDatabaseHas('categories',['name'=>$category->name]);
    }
    public function test_validate_store()
    {   
        Livewire::test(CategoryComponent::class)
        ->set(['name'=>' ','user_id'=>' '])
        ->call('store');
        // ->assertSee('Edit category');
        $this->assertDatabaseCount('categories',0);
    }
    public function test_edit()
    {
        $category=Category::factory()->create();
        Livewire::test(CategoryComponent::class)
        ->call('edit',$category->id)
        ->assertSet('name',$category->name);
    }
  
 
}
