<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class TeamController extends Controller
{
    public function index(): View
    {
        return view('pages.frontend.team');
    }
}
