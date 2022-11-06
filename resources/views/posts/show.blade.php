<x-layouts.blog :title="$post->title">
    <x-slot:meta>
        <meta property="og:url" content="{{ route('posts.show', ['post' => $post->slug]) }}" />
        <meta property="og:title" content="{{ $post->title }}" />
        <meta property="og:description" content="{{ $post->excerpt }}" />

        <meta property="twitter:url" content="{{ route('posts.show', ['post' => $post->slug]) }}" />

        @vite('resources/css/app.css')
    </x-slot:meta>

    <article class="max-w-none prose lg:prose-lg prose-stone prose-img:m-auto prose-h1:mb-0">
        <header>
            <h1>{{ $post->title }}</h1>
            <section>
                @foreach ($post->tags as $tag)
                    <x-tag :$tag />
                @endforeach
                &bull;
                <time datetime="{{ $post->released_at->toDateTimeString() }}" class="text-sm text-gray-400">{{ $post->released_at->format('F d, Y') }}</time>
            </section>
        </header>
        @markdown($post->content)
    </article>
</x-layouts.blog>
