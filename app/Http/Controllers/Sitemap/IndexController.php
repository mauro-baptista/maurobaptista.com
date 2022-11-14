<?php

namespace App\Http\Controllers\Sitemap;

use App\Models\Post;

class IndexController
{
    public function __invoke()
    {
        return response()->view('sitemap.index', [
            'posts' => Post::published()->latest('updated_at')->get(['slug', 'updated_at']),
        ])->header('Content-Type', 'text/xml');
    }
}
