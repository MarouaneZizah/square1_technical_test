<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ImportPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Posts from third party blog platform API';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws \Exception
     */
    public function handle()
    {
        $endpoint = config('post.import_endpoint');

        $response = Http::get($endpoint);

        if ($response->status() !== 200) {
            throw new \Exception("API returned {$response->status()} status code");
        }

        $data = $response->json('data');

        if (!$data) {
            throw new \Exception("No Posts to import");
        }

        $admin = User::admin()->first();

        if (!$admin) {
            throw new \Exception("Can't find admin user");
        }

        foreach ($data as $post) {
            $admin->posts()->create([
                'title'            => $post['title'],
                'description'      => $post['description'],
                'publication_date' => $post['publication_date'],
            ]);
        }

        Cache::flush();
    }
}
