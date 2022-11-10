<?php

namespace Tests\Feature\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_load_post()
    {
        Post::factory()->published()->create([
            'title' => 'This is a test',
            'slug' => 'this-is-a-test',
            'content' => '# This is the content',
        ]);

        $response = $this->get('/posts/this-is-a-test');

        $response->assertStatus(200);
        $response->assertSee('This is a test');
        $response->assertSee('<h1>This is the content</h1>', false);
    }

    /** @test */
    public function cannot_load_unpublished_post()
    {
        Post::factory()->draft()->create([
            'slug' => 'this-is-a-test',
        ]);

        $response = $this->get('/posts/this-is-a-test');

        $response->assertStatus(404);
    }
}
