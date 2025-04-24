<?php

namespace App\Livewire;

use App\Models\Products as ModelsProducts;
use Livewire\Component;

class Products extends Component
{
    public function render()
    {
        $products = ModelsProducts::where('is_active', true)->orderByDesc('created_at')->get();
        return view('livewire.products', [
            'products' => $products
        ]);
    }
}
