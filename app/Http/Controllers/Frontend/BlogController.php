<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = Blog::query()
            ->with('categories')
            ->latest()
            ->get();

        return view('pages.frontend.blog', compact('blogs'));
    }

    public function show(Blog $blog): View
    {
        $blog->load('categories');

        $previousBlog = Blog::query()
            ->where('id', '!=', $blog->id)
            ->where(function ($query) use ($blog) {
                $query->where('created_at', '<', $blog->created_at)
                    ->orWhere(function ($query) use ($blog) {
                        $query->where('created_at', $blog->created_at)
                            ->where('id', '<', $blog->id);
                    });
            })
            ->latest()
            ->first();

        $nextBlog = Blog::query()
            ->where('id', '!=', $blog->id)
            ->where(function ($query) use ($blog) {
                $query->where('created_at', '>', $blog->created_at)
                    ->orWhere(function ($query) use ($blog) {
                        $query->where('created_at', $blog->created_at)
                            ->where('id', '>', $blog->id);
                    });
            })
            ->oldest()
            ->first();

        return view('pages.frontend.blog-show', compact('blog', 'previousBlog', 'nextBlog'));
    }
}
