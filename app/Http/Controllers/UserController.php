<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function get_published_posts()
    {
        $posts = auth()->user()->posts()->get();

        return view('dashboard.posts.list', compact('posts'));
    }
}
