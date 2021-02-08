<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $name, $user_id;
    public  $view = 'create';
    protected $rules = [
        'name' => 'required',
        'user_id' => 'required',
    ];
    public function render()
    {
        return view('livewire.category.category-component');
    }
    public function store()
    {
        $this->validate();
        $category = Category::create([
            'name' => $this->name,
            'user_id' => $this->user_id
        ]);
        $this->edit($category->id);
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $this->name = $category->name;
        $this->user_id = $category->user_id;
        $this->view = 'edit';
    }
    public function update()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $category = Category::find($this->user_id);
        // dd($this->name);
        $category->update([
            'name' => $this->name,
        ]);
        $this->default();
    }
    public function destroy($id)
    {
        Category::destroy($id);
    }
    public function default()
    {
        $this->view = 'create';
        $this->name = ' ';
    }
}
