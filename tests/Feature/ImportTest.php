<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImportTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_can_import_posts_from_api_using_command()
    {
        $this->withoutExceptionHandling();

        Config::set('post.import_endpoint', '*');

        $endpoint = config('post.import_endpoint');

        $feedMockPost = Post::factory(1)->make(['title' => 'Mock post'])->toArray();
        $adminUser    = User::factory()->admin()->create();

        Http::fake([
            $endpoint => Http::response([
                'data' => $feedMockPost,
                'mock' => true,
            ]),
        ]);

        $this->artisan('post:import')->assertExitCode(0);

        $this->assertDatabaseHas('posts', [
            'title'   => 'Mock post',
            'user_id' => $adminUser->id,
        ]);
    }
}
