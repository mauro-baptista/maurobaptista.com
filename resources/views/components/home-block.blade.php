@props([
    'title',
    'actions' => null,
])

<div {{ $attributes->class([]) }}>
    <h2 class="relative text-3xl md:text-4xl font-bold text-gray-700 hover:text-gray-500 mb-4">
        {{ $title }}
        {{ $actions }}
    </h2>
    <div class="prose lg:prose-lg prose-stone max-w-none">
        <div class="bg-white px-2 md:px-6 py-4 md:py-6 rounded md:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
