{{-- -- Important note:
--
-- This template is bought with a personal license. Please do not use this template in your projects without purchasing a Tailwind UI license
--
-- Purchase here: https://tailwindui.com/
-- --}}

@props([
    'leadingAddOn' => false,
])

<div class="flex rounded-sm shadow-sm">

    @if ($leadingAddOn)
        <span
            class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-sm bg-gray-50 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif

    <input
        {{ $attributes->merge(['class' => 'block w-full mt-1 px-4 py-2 leading-tight text-sm text-gray-700 bg-transparent border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-amber-300'
        . ($leadingAddOn ? ' rounded-none rounded-r-sm' : '')]) }} />
</div>
