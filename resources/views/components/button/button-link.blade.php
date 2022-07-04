@props([
    'stroke' => 'currentColor',
    'svgClass' => 'w-4 h-4',
    'type' => 'defaultBtn',
])

@if ($type === 'viewIcon')
    <a
        {{ $attributes->merge(['class' => 'inline-flex items-center p-2 text-xs font-semibold tracking-widest text-gray-600 uppercase transition bg-transparent border border-transparent rounded-md hover:bg-green-100 hover:shadow-sm active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
        {{ $slot }}
    </a>
@elseif($type === 'editIcon')
    <a {{ $attributes->merge(['class' => 'inline-flex items-center p-2 text-xs font-semibold tracking-widest text-gray-600 uppercase transition bg-transparent border border-transparent rounded-md hover:bg-sky-100 active:bg-sky-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
        {{ $slot }}
    </a>
@elseif($type === 'deleteIcon')
    <a
        {{ $attributes->merge(['class' => 'inline-flex items-center p-2 text-xs font-semibold tracking-widest text-gray-600 uppercase transition bg-transparent border border-transparent rounded-md hover:bg-red-100 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
        {{ $slot }}
    </a>
@elseif($type === 'restoreIcon')
    <a
        {{ $attributes->merge(['class' => 'inline-flex items-center p-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-transparent border border-transparent rounded-md hover:bg-gray-100 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
        {{ $slot }}
    </a>
@elseif($type === 'createIcon')
    <a
        {{ $attributes->merge(['class' => 'inline-flex items-center text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-500 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
        <x-icons.plus class="{{ $svgClass }}"></x-icons.plus> {{ $slot }}
    </a>
@else
    <a
        {{ $attributes->merge(['class' => 'inline-flex items-center bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
        {{ $slot }}
    </a>
@endif
