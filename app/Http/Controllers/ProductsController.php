<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Products::where('is_active', true)->orderByDesc('created_at')->get();

        return view('sections.index.arrivals', [
            'products' => $products
        ]);
    }

    public function showOrCategory($id)
    {
        $products = Products::where('is_active', true)->where('category_id', $id)->get();

        return view('pages.category-products', [
            'products' => $products,
        ]);
    }
}
