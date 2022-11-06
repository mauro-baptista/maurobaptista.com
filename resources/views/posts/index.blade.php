<x-layouts.blog>
    <x-slot:meta>
        <meta property="og:url" content="{{ route('homepage') }}" />
        <meta property="og:title" content="{{ config('site.author.name') }}" />
        <meta property="og:description" content="{{ config('site.author.description') }}" />

        <meta property="twitter:url" content="{{ route('homepage') }}" />
    </x-slot:meta>

    <div class="prose lg:prose-lg prose-stone max-w-none">
        @foreach ($posts as $post)
            <article class="mt-0 mb-4 @if (!$loop->last) border-b border-gray-100 @endif">
                <a class="not-prose no-underline" href="{{ route('posts.show', ['post' => $post->slug]) }}">
                    <h2 class="text-2xl md:text-4xl font-bold text-gray-700 hover:text-gray-500">{{ $post->title }}</h2>
                </a>
                <section>
                    @foreach ($post->tags as $tag)
                        <x-tag :$tag />
                    @endforeach
                </section>
                <div class="not-prose my-4">
                    <p>{{ $post->excerpt }}</p>
                </div>
            </article>
        @endforeach

        @if ($posts->hasPages())
            <div class="mt-16">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</x-layouts.blog>
