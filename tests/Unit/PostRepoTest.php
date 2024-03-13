<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Repositories\PostRepo;
use App\Models\User;
use Illuminate\Http\UploadedFile;

class PostRepoTest extends TestCase
{
    use RefreshDatabase;


    protected $postRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->postRepo = new PostRepo();
    }

    public function testAddPost()
    {
        $user = User::factory()->create([
            'phone' => '06554584848',
        ]);

        $image = UploadedFile::fake()->image('oho.jpg');

        $postData = [
            'content' => 'Test Content',
        'user_id' => $user->id,
        'date_creation' => now(),
        'image' => $image,
        ];

        $request = new \Illuminate\Http\Request($postData);

        $this->postRepo->addPost($request);

        $this->assertDatabaseHas('posts', [
            'content' => 'test content',
             'user_id' => $user->id,
        ]);
    }
}
