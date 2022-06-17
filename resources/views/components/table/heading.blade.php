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
                    A
                @elseif ($direction === 'desc')
                    D
                @else
                    -
                @endif
            </span>
        </button>

    @endunless

</th>