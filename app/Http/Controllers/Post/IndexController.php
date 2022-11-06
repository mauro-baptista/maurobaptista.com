<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class IndexController
{
    public function __invoke(): View
    {
        return view('posts.index', [
            'posts' => Post::released()->with('tags')->simplePaginate(),
        ]);
    }
}
