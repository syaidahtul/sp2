<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Operasi') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <livewire:operasi.index>                
        </div>

    </div>

    <div>
        <!-- Report Result -->
        <div class="py-6 font-bold text-center">
            {{-- @if ($jenisOperasi === 'RUMPUT')
                OPERASI PEMOTONGAN RUMPUT
            @elseif ($jenisOperasi === 'PARIT')
                OPERASI PEMBERSIHAN PARIT
            @else
                OPERASI KUTIPAN SAMPAH
            @endif --}}
    
            <div class="">
                Bulan: <x-jet-input type="month" wire:model="month"></x-input>
            </div>
        </div>
                
        <div class="col-span-6 py-4 md:col-start-1 sm:col-span-4 md:col-span-2">
            <x-jet-label for="namaLokasi" value="{{ __('Nama Lokasi') }}" />
            <x-jet-input id="namaLokasi" type="text" class="block w-full mt-1 text-sm" wire:model="namaLokasi"/>
            <x-jet-input-error for="namaLokasi" class="mt-2" />
        </div>
    
        <x-table wire:ignore.self class="p-4">
                                
            <x-slot name="head">
                <x-table.heading sortable> No </x-table.heading>
                <x-table.heading sortable> Nama Lokasi </x-table.heading>
                <x-table.heading sortable> Status Operasi </x-table.heading>
                <x-table.heading sortable> Peratusan Kemajuan  </x-table.heading>
                <x-table.heading sortable> Catatan  </x-table.heading>
                <x-table.heading> </x-table.heading>
            </x-slot>
    
            <x-slot name="body">
                {{-- @forelse ($operasis as $item)
                    <x-table.row wire:loading.class="opacity-50">
                        <x-table.cell> 
                            {{ $loop->iteration }}
                        </x-table.cell>
                        <x-table.cell> 
                            {{ $item->nama }}
                        </x-table.cell>
                        <x-table.cell> 
                            {{ $item->status }} 
                        </x-table.cell>
                        <x-table.cell> 
                            {{ $item->peratus_kemajuan }} 
                        </x-table.cell>
                        <x-table.cell> 
                            {{ $item->catatan }} 
                        </x-table.cell>
                        <x-table.cell class="text-end"> 
                            @if ( $item->status_laporan === 'Dihantar' )
                                <button type="button"  
                                    class="inline-flex items-center px-4 py-2 font-semibold tracking-widest text-gray-600 uppercase transition bg-gray-300 border border-transparent rounded-md'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            @else
                                <button type="button"  wire:click="edit({{ $item->id }})" 
                                    class="inline-flex items-center px-4 py-2 font-semibold tracking-widest text-gray-600 uppercase transition bg-yellow-300 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                </button>
                            @endif
                            <button type="button"  wire:click="delete({{ $item->id }})" 
                                class="inline-flex items-center px-4 py-2 font-semibold tracking-widest text-gray-600 uppercase transition bg-red-300 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-table.cell>
                    </x-table.row>
                @empty                                        
                    <x-table.row>
                        <x-table.cell colspan=3 class="text-center"> 
                            {{ __('Tiada rekod.') }}
                        </x-table.cell>
                    </x-table.row>
                @endforelse --}}
            </x-slot>
            
        </x-table>
    
        {{-- {{ $operasis->links() }} --}}
    </div>
    
</x-app-layout>