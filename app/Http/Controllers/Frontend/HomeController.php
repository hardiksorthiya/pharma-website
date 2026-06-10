<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Replace this array with database data in the future.
        $heroSlides = [
            [
                'badge' => 'Future-Focused Pharmaceutical Company',
                'title' => 'Supporting health with trusted pharmaceutical excellence',
                'text' => 'We provide reliable pharmaceutical solutions backed by scientific expertise, advanced technology, and strict quality standards to support accurate healthcare and meaningful patient outcomes.',
                'button_text' => 'Explore Our Products',
                'button_url' => '#',
                'background_image' => null,
                'background_video' => asset('assets/images/bg.mp4'),
                'card' => [
                    'stat' => '98%',
                    'avatars' => [
                        'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=100&q=80',
                        'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?auto=format&fit=crop&w=100&q=80',
                        'https://images.unsplash.com/photo-1594824476967-48c8b964273f?auto=format&fit=crop&w=100&q=80',
                        'https://images.unsplash.com/photo-1582750433449-648ed127bb54?auto=format&fit=crop&w=100&q=80',
                    ],
                    'title' => 'Product Quality & Safety',
                    'text' => 'We maintain the highest standards of product quality, safety, and regulatory compliance.',
                ],
            ],
        ];

        return view('pages.frontend.home', compact('heroSlides'));
    }
}
