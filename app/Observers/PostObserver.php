<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    /**
     * Handle the Post "creating" event.
     *
     * @param  Post  $post
     *
     * @return void
     */
    public function creating(Post $post)
    {
        $post->slug = Str::slug($post->title, "_") . '-' . md5(random_int(2,10000));
    }

    /**
     * Handle the Post "created" event.
     *
     * @param  Post  $post
     *
     * @return void
     */
    public function created(Post $post)
    {
        Cache::tags(['posts'])->flush();
    }

    /**
     * Handle the Post "updated" event.
     *
     * @param  Post  $post
     *
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     *
     * @param  Post  $post
     *
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     *
     * @param  Post  $post
     *
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     *
     * @param  Post  $post
     *
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
