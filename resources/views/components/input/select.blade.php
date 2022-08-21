{{-- -- Important note:
--
-- This template is bought with a personal license. Please do not use this template in your projects without purchasing a Tailwind UI license
--
-- Purchase here: https://tailwindui.com/
-- --}}

@props([
    'placeholder' => false,
    'disabled' => false,
])

<div class="flex rounded-md shadow-sm">
    <select {{ $disabled ? 'disabled' : '' }}
        {{ $attributes->merge(['class' => 'block w-full mt-1 px-4 py-2 leading-tight text-sm text-gray-700 bg-transparent border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-amber-300']) }}>

        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        {{ $slot }}
    </select>
</div>
