<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::query()
            ->with(['category', 'subCategory'])
            ->orderBy('title')
            ->get();

        $categories = ProductCategory::query()
            ->orderBy('title')
            ->get(['id', 'title']);

        $subCategories = ProductSubCategory::query()
            ->orderBy('title')
            ->get(['id', 'title', 'product_category_id']);

        $enquiryProducts = Product::query()
            ->orderBy('title')
            ->get(['id', 'title']);

        return view('pages.frontend.products', [
            'products' => $products,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'enquiryProducts' => $enquiryProducts,
        ]);
    }

    public function category(ProductCategory $category): View
    {
        $subCategories = $category->subCategories()
            ->withCount('products')
            ->orderBy('title')
            ->get();

        if ($subCategories->isNotEmpty()) {
            return view('pages.frontend.product-category', compact('category', 'subCategories'));
        }

        $products = Product::query()
            ->with(['category', 'subCategory'])
            ->where('product_category_id', $category->id)
            ->orderBy('title')
            ->get();

        $enquiryProducts = Product::query()
            ->orderBy('title')
            ->get(['id', 'title']);

        return view('pages.frontend.product-category', compact(
            'category',
            'subCategories',
            'products',
            'enquiryProducts'
        ));
    }

    public function subCategory(ProductCategory $category, ProductSubCategory $subCategory): View
    {
        if ($subCategory->product_category_id !== $category->id) {
            abort(404);
        }

        $products = Product::query()
            ->with(['category', 'subCategory'])
            ->where('product_sub_category_id', $subCategory->id)
            ->orderBy('title')
            ->get();

        $enquiryProducts = Product::query()
            ->orderBy('title')
            ->get(['id', 'title']);

        return view('pages.frontend.product-sub-category', compact(
            'category',
            'subCategory',
            'products',
            'enquiryProducts'
        ));
    }

    public function show(Product $product): View
    {
        $product->load([
            'category',
            'subCategory',
            'dosageTypes',
            'therapeuticClasses',
            'specifications',
        ]);

        return view('pages.frontend.product-show', [
            'product' => $product,
        ]);
    }
}
