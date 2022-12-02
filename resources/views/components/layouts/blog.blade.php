@props([
    'title' => null,
])

<x-layouts.app :title="$title">
    <div class="bg-white px-2 md:px-6 py-4 md:py-6 rounded md:rounded-lg">
        {{ $slot }}
    </div>
</x-layouts.app>
