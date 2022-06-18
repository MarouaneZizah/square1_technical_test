<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function get_all_posts()
    {
        $posts = Cache::remember('posts', 3600, function () {
            return Post::with('user')->get();
        });

        return view('home', compact('posts'));
    }

    public function view($slug)
    {
        $post = Cache::rememberForever('post_'.$slug, function () use ($slug) {
            return Post::with('user')->where('slug', $slug)->firstOrFail();
        });

        return view('post_view', compact('post'));
    }
}
