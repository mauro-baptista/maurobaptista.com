<?php

namespace Tests\Feature\Http\Controllers\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SitemapControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function xml_builder()
    {
        Post::factory()->published()->create([
            'title' => 'This is a test',
            'slug' => 'this-is-a-test',
            'updated_at' => '2022-10-10 10:10:10',
        ]);

        Post::factory()->published()->create([
            'title' => 'This is another test',
            'slug' => 'this-is-another-test',
            'updated_at' => '2022-10-11 10:10:10',
        ]);

        Post::factory()->draft()->create([
            'title' => 'This is a non-released test',
            'slug' => 'this-is-a-non-released-test',
            'updated_at' => '2022-10-12 10:10:10',
        ]);

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);

        $sitemapXml = simplexml_load_string($response->content());
        $sitemap = json_decode(json_encode($sitemapXml), true)['url'];

        $expected = [[
            'loc' => route('homepage'),
            'lastmod' => '2022-10-11T10:10:10+00:00',
            'changefreq' => 'weekly',
            'priority' => '1.00',
        ], [
            'loc' => route('posts.index'),
            'lastmod' => '2022-10-11T10:10:10+00:00',
            'changefreq' => 'weekly',
            'priority' => '0.80',
        ], [
            'loc' => route('posts.show', ['post' => 'this-is-another-test']),
            'lastmod' => '2022-10-11T10:10:10+00:00',
            'priority' => '0.80',
        ], [
            'loc' => route('posts.show', ['post' => 'this-is-a-test']),
            'lastmod' => '2022-10-10T10:10:10+00:00',
            'priority' => '0.80',
        ]];

        $this->assertEquals($expected, $sitemap);
    }
}
