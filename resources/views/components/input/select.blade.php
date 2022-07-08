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
    'disabled' => false,
])

<select {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'mt-1 w-full px-4 py-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm' ]) }}>
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif
    
    {{ $slot }}
</select>