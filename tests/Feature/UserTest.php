<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_home_page_is_working()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }

    public function test_can_see_post_details_in_home_page()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('home'));

        $response->assertSee($post->title);
        $response->assertSee($post->short_description);
        $response->assertSee($post->publication_date->format('F d, Y'));
    }

    public function test_can_open_post_details_page()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('post.view', ['post' => $post]));

        $response->assertSee($post->title);
        $response->assertSee($post->description);
        $response->assertSee($post->publication_date->format('F d, Y'));
    }
}
