<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web\Backend\Posts;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController
{
    public function __invoke(Request $request, Post $post): View
    {
        $post->load(['category']);

        return view('app.posts.show', [
            'post' => $post,
            'categories' => Category::query()->get(),
        ]);
    }
}
