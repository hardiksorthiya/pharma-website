<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::query()
            ->where('is_active', true)
            ->with('images')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('pages.frontend.gallery', compact('galleries'));
    }
}
