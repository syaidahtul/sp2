{{--
-- Important note:
-- 
-- This template is bought with a personal license. Please do not use this template in your projects without purchasing a Tailwind UI license
--
-- Purchase here: https://tailwindui.com/
--
--}}

@props([
    'label',
    'for',
    'error' => false,
    'helpText' => false,
    'inline' => false,
    'paddingless' => false,
    'borderless' => false,
])

@if($inline)
    <div>
        
    </div>

@else

    <div class="grid gap-4 p-4 xs:grid-cols-1 md:grid-cols-6">
        <label for="{{ $for }}" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            {{ $label }}
        </label>

        <div class="md:col-span-5">
            {{ $slot }}

            @if ($error)
                <div class="mt-1 text-sm text-red-500">{{ $error }}</div>
            @endif

            @if ($helpText)
                <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
            @endif
        </div>
    </div>

@endif