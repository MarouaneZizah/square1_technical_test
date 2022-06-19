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

   public function test_user_can_sort_posts_by_newest()
    {
        Post::factory()->create(['title' => 'Post 1', 'publication_date' => now()]);
        Post::factory()->create(['title' => 'Post 2', 'publication_date' => now()->addHour()]);
        Post::factory()->create(['title' => 'Post 3', 'publication_date' => now()->subHour()]);

        $this->get(route('home', ['sort' => 'desc']))
             ->assertSeeInOrder([
                 'Post 2',
                 'Post 1',
                 'Post 3'
             ]);
    }

    public function test_user_can_sort_posts_by_oldest()
    {
        Post::factory()->create(['title' => 'Post 1', 'publication_date' => now()]);
        Post::factory()->create(['title' => 'Post 2', 'publication_date' => now()->addHour()]);
        Post::factory()->create(['title' => 'Post 3', 'publication_date' => now()->subHour()]);

        $this->get(route('home', ['sort' => 'asc']))
             ->assertSeeInOrder([
                 'Post 3',
                 'Post 1',
                 'Post 2'
             ]);
    }
}
