<?php

namespace App\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class ShowController
{
    public function __invoke(Post $post): View
    {
        abort_unless($post->is_published, 404, 'Post not found');

        return view('posts.show', [
            'post' => $post,
        ]);
    }
}
