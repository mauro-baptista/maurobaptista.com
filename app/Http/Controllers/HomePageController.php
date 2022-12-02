<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomePageController
{
    public function __invoke()
    {
        return response()->view('homepage', [
            'projects' => config('site.projects'),
            'packages' => config('site.packages'),
            'posts' => Post::published()->with('tags')->limit(3)->get(),
        ]);
    }
}
