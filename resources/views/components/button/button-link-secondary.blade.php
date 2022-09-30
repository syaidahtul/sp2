@props([
    'stroke' => 'currentColor',
    'svgClass' => 'w-4 h-4',
    'type' => 'defaultBtn',
])

@if($type === 'backIcon')
    <a
        {{ $attributes->merge(['class' => 'px-4 py-2 bg-white border border-gray-300 shadow-sm inline-flex items-center rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:px-4 focus:py-2 focus:ring focus:ring-blue-100 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition cursor-pointer']) }}>
        <x-icons.back class="{{ $svgClass }}" stroke="{{ $stroke }}"></x-icons.back> {{ $slot }}
    </a>
@elseif ($type === 'bordered')
    <a
        {{ $attributes->merge(['class' => 'inline-flex items-center rounded-md font-semibold border border-gray-300 text-xs text-gray-700 uppercase tracking-widest hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:px-4 focus:py-2 focus:ring focus:ring-blue-100 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition cursor-pointer px-4 py-2']) }}>
        {{ $slot }}
    </a>
@else
    <a
        {{ $attributes->merge(['class' => 'inline-flex items-center rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:px-4 focus:py-2 focus:ring focus:ring-blue-100 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition cursor-pointer']) }}>
        {{ $slot }}
    </a>
@endif
