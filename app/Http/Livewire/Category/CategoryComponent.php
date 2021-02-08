<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $name,$user_id;
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
        $category=Category::create([
            'name'=>$this->name,
            'user_id'=>$this->user_id
        ]);
    }
    public function edit($id)
    {
        $category=Category::find($id);
        $this->name=$category->name;
        $this->user_id=$category->user_id;
    }
    
}
