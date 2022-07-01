{{--
-- Important note:
-- 
-- This template is bought with a personal license. Please do not use this template in your projects without purchasing a Tailwind UI license
--
-- Purchase here: https://tailwindui.com/
--
--}}

@props([
    'placeholder' => false,
])

<div class="flex rounded-md shadow-sm">
    
    <select {{ $attributes->merge(['class' => 'block w-full px-4 py-2 leading-tight text-gray-700 bg-transparent border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-sky-300' ]) }}>
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        
        {{ $slot }}
    </select>
    
</div>