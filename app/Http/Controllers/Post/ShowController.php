<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class ShowController
{
    public function __invoke(Post $post): View
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
