<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Slider;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $heroSlides = Slider::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(fn (Slider $slider) => $slider->toHeroSlideArray())
            ->all();

        $blogs = Blog::query()
            ->with('categories')
            ->latest()
            ->limit(3)
            ->get();

        return view('pages.frontend.home', compact('heroSlides', 'blogs'));
    }
}
