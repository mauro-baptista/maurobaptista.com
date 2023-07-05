<x-layouts.app>
    <x-slot:meta>
        <meta property="og:url" content="{{ route('homepage') }}" />
        <meta property="og:title" content="{{ config('site.author.name') }}" />
        <meta property="og:description" content="{{ config('site.author.description') }}" />

        <meta property="twitter:url" content="{{ route('homepage') }}" />

        <script src="https://cdn.usefathom.com/script.js" data-site="VGNMWWFS" defer></script>
    </x-slot:meta>

    <div class="mb-8">
        <div class="prose lg:prose-lg prose-stone max-w-none">
            <x-home-block>
                <x-slot:title>Posts</x-slot:title>
                <x-slot:actions>
                    <a href="{{ route('posts.index') }}" class="absolute right-0 top-1 inline-flex no-underline items-center rounded-md border border-transparent bg-gray-600 px-3 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-blue-700">
                        See all posts
                    </a>
                </x-slot:actions>

                @foreach ($posts as $post)
                    <x-home-link :add-border="!$loop->last" :tags="$post->tags->pluck('name')">
                        <x-slot:title>{{ $post->title }}</x-slot:title>
                        <x-slot:link>{{ route('posts.show', ['post' => $post->slug]) }}</x-slot:link>
                        <x-slot:excerpt>{{ $post->excerpt }}</x-slot:excerpt>
                    </x-home-link>
                @endforeach
            </x-home-block>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <x-home-block>
            <x-slot:title>Projects</x-slot:title>

            @foreach ($projects as $project)
                <x-home-link :add-border="!$loop->last" :tags="$project['tags']">
                    <x-slot:title>{{ $project['name'] }}</x-slot:title>
                    <x-slot:link>{{ $project['link'] }}</x-slot:link>
                    <x-slot:excerpt>{{ $project['description'] }}</x-slot:excerpt>
                    <x-slot:github>{{ $project['github'] }}</x-slot:github>
                </x-home-link>
            @endforeach
        </x-home-block>

        <x-home-block>
            <x-slot:title>Packages</x-slot:title>

            @foreach ($packages as $package)
                <x-home-link :add-border="!$loop->last" :tags="$package['tags']">
                    <x-slot:title>{{ $package['name'] }}</x-slot:title>
                    <x-slot:link>{{ $package['link'] }}</x-slot:link>
                    <x-slot:excerpt>{{ $package['description'] }}</x-slot:excerpt>
                    <x-slot:github>{{ $package['github'] }}</x-slot:github>
                </x-home-link>
            @endforeach
        </x-home-block>
    </div>
</x-layouts.app>
