<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function get_all_posts()
    {
        $page = request('page', 1);

        $defaultSort = 'desc';
        $sort        = request('sort', $defaultSort);
        $validSorts  = ['asc', 'desc'];

        if (!in_array($sort, $validSorts)) {
            $sort = $defaultSort;
        }

        $cacheKey = "posts_{$page}_{$sort}";

        $posts = Cache::tags(['posts'])->rememberForever($cacheKey, function () use ($sort) {
            return Post::with('user')->orderBy('publication_date', $sort)->paginate(10)->withQueryString();
        });

        return view('home', compact('posts'));
    }

    public function view($slug)
    {
        $cacheKey = "post_".$slug;

        $post = Cache::tags(['post'])->rememberForever($cacheKey, function () use ($slug) {
            return Post::with('user')->where('slug', $slug)->firstOrFail();
        });

        return view('post_view', compact('post'));
    }

    public function new()
    {
        return view('dashboard.posts.new');
    }

    public function store(StorePostRequest $request)
    {
        Post::create([
            'user_id'          => auth()->id(),
            'title'            => $request->title,
            'description'      => $request->description,
            'publication_date' => now(),
        ]);

        return redirect()->route('dashboard')->with('success', __('Post published successfully!'));
    }
}
