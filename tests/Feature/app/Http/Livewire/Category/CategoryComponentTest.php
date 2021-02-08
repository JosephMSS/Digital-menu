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
        $category = Category::factory()->make();
        Livewire::test(CategoryComponent::class)
            ->set(['name' => $category->name, 'user_id' => $category->user->id])
            ->call('store')
            ->assertSet('view', 'edit');
        $this->assertDatabaseHas('categories', ['name' => $category->name]);
    }
    public function test_validate_store()
    {
        Livewire::test(CategoryComponent::class)
            ->set(['name' => ' ', 'user_id' => ' '])
            ->call('store');
        $this->assertDatabaseCount('categories', 0);
    }
    public function test_edit()
    {
        $category = Category::factory()->create();
        Livewire::test(CategoryComponent::class)
            ->call('edit', $category->id)
            ->assertSet('name', $category->name)
            ->assertSet('view', 'edit');
            
    }
    public function test_default_state()
    {   
        Livewire::test(CategoryComponent::class)
            ->call('default')
            ->assertSet('name', ' ')
            ->assertSet('view', 'create');
    }
    public function test_update()
    {
        $category = Category::factory()->create();
        $newDataCategory = Category::factory()->make(); //nueva info

        Livewire::test(CategoryComponent::class)
            ->call('edit', $category->id) //selecciono
            ->set(['name' => $newDataCategory->name]) //nueva informacion
            ->call('update')
            ->assertSet('view','create')
            ->assertSet('name',' ');
             //actualizo

        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => $newDataCategory->name]); //verifico que se guardo la nueva informacion
    }
    public function test_validate_update()
    {
        $category = Category::factory()->create();

        Livewire::test(CategoryComponent::class)
            ->call('edit', $category->id) //selecciono
            ->set(['name' => ' ']) //nueva informacion
            ->call('update'); //actualizo

        $this->assertDatabaseHas('categories', ['name' => $category->name]); //verifico que se guardo la nueva informacion

    }
    public function test_soft_delete()
    {
        $category = Category::factory()->create();

        Livewire::test(CategoryComponent::class)
            ->call('destroy', $category->id);

        $this->assertSoftDeleted('categories', ['id' => $category->id]);
    }
    
}
