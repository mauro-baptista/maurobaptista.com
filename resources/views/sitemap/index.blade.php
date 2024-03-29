<?xml version="1.0" encoding="UTF-8"?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>{{ route('homepage') }}</loc>
        <lastmod>{{ $posts->first()->updated_at->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{ route('posts.index') }}</loc>
        <lastmod>{{ $posts->first()->updated_at->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>

    @foreach ($posts as $post)
        <url>
            <loc>{{ route('posts.show', ['post' => $post->slug]) }}</loc>
            <lastmod>{{ $post->updated_at->toAtomString() }}</lastmod>
            <priority>0.80</priority>
        </url>
    @endforeach
</urlset>
