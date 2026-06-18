<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = ProductCategory::query()
            ->withCount('products')
            ->orderBy('title')
            ->get();

        $products = Product::query()
            ->orderBy('title')
            ->get(['id', 'title']);

        return view('pages.frontend.categories', compact('categories', 'products'));
    }
}
