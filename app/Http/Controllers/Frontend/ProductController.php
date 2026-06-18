<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with(['categories'])
            ->orderBy('title')
            ->get();

        $categories = ProductCategory::query()
            ->orderBy('title')
            ->get(['id', 'title']);

        $enquiryProducts = Product::query()
            ->orderBy('title')
            ->get(['id', 'title']);

        return view('pages.frontend.products', [
            'products' => $products,
            'categories' => $categories,
            'enquiryProducts' => $enquiryProducts,
        ]);
    }

    public function show(Product $product): View
    {
        $product->load([
            'categories',
            'dosageTypes',
            'therapeuticClasses',
            'packings',
            'specifications',
        ]);

        return view('pages.frontend.product-show', [
            'product' => $product,
        ]);
    }
}
