<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_dashboard_pages_are_auth_protected()
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
        $this->get(route('post.new'))->assertRedirect(route('login'));
        $this->post(route('post.create'))->assertRedirect(route('login'));
    }

    public function test_user_can_access_new_post_page()
    {
        $john = User::factory()->create();

        $this->actingAs($john);

        $response = $this->get(route('post.new'));

        $response->assertStatus(200);
    }

    public function test_user_can_publish_a_post()
    {
        $john = User::factory()->create();

        $title       = "This is my post";
        $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tincidunt aliquet eleifend. Maecenas sit amet enim odio. Etiam quis nulla ac ante pretium finibus. Integer lacinia ultrices lectus, eget venenatis velit rhoncus eu. Vivamus a leo blandit nunc maximus pharetra sit amet vitae ipsum. Praesent finibus vitae ante id fringilla. Etiam et congue nulla. Integer fermentum vel nisl id maximus. Nulla fermentum ex leo, sed posuere massa euismod et.";

        $this->actingAs($john);

        $this->post(route("post.create"), [
            'title'       => $title,
            'description' => $description,
        ])->assertSessionHas('success')->assertRedirect(route('dashboard'));

        $this->get(route('dashboard'))->assertSee($title);
    }

    public function test_can_see_his_posts()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->get(route('dashboard'));

        $response->assertSee($post->title);
        $response->assertSee($post->short_description);
        $response->assertSee($post->publication_date->format('F d, Y'));
    }

    public function test_cannot_see_others_posts()
    {
        $john  = User::factory()->create();
        $david = User::factory()->create();

        $this->actingAs($john);

        $david_post = Post::factory()->create([
            'user_id' => $david->id,
        ]);

        $response = $this->get(route('dashboard'));

        $response->assertDontSee($david_post->title);
        $response->assertDontSee($david_post->short_description);
        $response->assertDontSee($david_post->publication_date->format('F d, Y'));
    }
}
