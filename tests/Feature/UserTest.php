<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_home_page_is_working()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_can_see_post_title_and_description_in_home_page()
    {
        $post = Post::factory()->create();

        $response = $this->get('/');

        $response->assertSee($post->title);
        $response->assertSee($post->description);
    }

    public function test_can_see_user_posts()
    {

    }

    public function test_user_can_post_view_page()
    {

    }
}
