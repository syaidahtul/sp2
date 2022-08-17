@props([
    'sortable' => null,
    'direction' => null
])

<th {{ $attributes->merge([ 'class' => 'px-6 py-3 bg-gray-50 '])->only('class') }}>

    @unless ($sortable)

        <span class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">{{ $slot }}</span>

    @else

        <button {{ $attributes->except('class') }} class="flex items-center space-x-1 text-xs font-medium leading-4 text-left text-gray-500 uppercase">

            <span>{{ $slot }}</span>

            <span>
                @if ($direction === 'asc')
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
                    </svg>
                @elseif ($direction === 'desc')
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                @else
                    -
                @endif
            </span>
        </button>

    @endunless

</th>
