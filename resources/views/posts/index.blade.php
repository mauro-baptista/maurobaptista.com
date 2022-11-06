<x-layouts.blog>
    <x-slot:meta>
        <meta property="og:url" content="{{ route('homepage') }}" />
        <meta property="og:title" content="{{ config('site.author.name') }}" />
        <meta property="og:description" content="{{ config('site.author.description') }}" />

        <meta property="twitter:url" content="{{ route('homepage') }}" />
    </x-slot:meta>

    <div class="prose lg:prose-lg prose-stone max-w-none">
        @foreach ($posts as $post)
            <article>
                <a href="{{ route('posts.show', ['post' => $post->slug]) }}">
                    <h2>{{ $post->title }}</h2>
                </a>
                <section>
                    @foreach ($post->tags as $tag)
                        <x-tag :$tag />
                    @endforeach
                </section>
                <p>{{ $post->excerpt }}</p>
            </article>
        @endforeach

        <div class="mt-16">
            {{ $posts->links() }}
        </div>
    </div>
</x-layouts.blog>
