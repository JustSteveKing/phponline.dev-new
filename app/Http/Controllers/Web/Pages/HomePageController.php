<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Pages;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomePageController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('pages.home', [
            'posts' => Post::query()->with(['author'])->published()->get(),
        ]);
    }
}
