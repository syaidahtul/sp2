{{--
-- Important note:
-- 
-- This template is bought with a personal license. Please do not use this template in your projects without purchasing a Tailwind UI license
--
-- Purchase here: https://tailwindui.com/
--
--}}

@props([
    'leadingAddOn' => false,
])

<div class="flex rounded-md shadow-sm">
    
    @if ($leadingAddOn)
        <span class="inline-flex items-center px-3 text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50 sm:text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif

    <input {{ $attributes->merge(['class' => 'block w-full px-4 py-2 leading-tight text-gray-700 bg-transparent border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-sky-300' . ($leadingAddOn ? ' rounded-none rounded-r-md' : '')]) }}/>
</div>