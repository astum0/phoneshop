<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{
    public function render()
    {
        $categories = Category::orderByDesc('created_at')->get();
        return view('livewire.category.category-list', [
            'categories' => $categories
        ]);
    }
}
