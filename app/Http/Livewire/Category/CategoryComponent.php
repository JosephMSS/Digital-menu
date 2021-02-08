<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public $name,$user_id;
    public function render()
    {
        return view('livewire.category.category-component');
    }
    public function store()
    {
        $category=Category::create([
            'name'=>$this->name,
            'user_id'=>$this->user_id
        ]);
    }
}
