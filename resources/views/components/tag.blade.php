@props(['tag'])


<span {{ $attributes->class(['inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-200 text-gray-600']) }}>
    {{ $tag->name }}
</span>
