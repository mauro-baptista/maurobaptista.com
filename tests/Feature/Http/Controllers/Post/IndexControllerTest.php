<?php

namespace Tests\Feature\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_load_posts()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
        $this->assertInstanceOf(Paginator::class, $response->viewData('posts'));
    }

    /** @test */
    public function do_not_load_unpublished_posts()
    {
        Post::factory()->draft()->create([
            'title' => 'This is a draft post',
        ]);

        Post::factory()->published()->create([
            'title' => 'This is a published post',
        ]);

        $response = $this->get('/posts');

        $response->assertStatus(200);
        $response->assertSee('This is a published post');
        $response->assertDontSee('This is a draft post');
    }
}
