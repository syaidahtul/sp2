<x-app-layout>
    
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Senarai Tapak Pelupusan Sampah') }}
        </h2>
    </x-slot>   
    
    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="mt-5 md:mt-0 md:col-span-2">

                    <form wire:submit.prevent="submit">
                        
                        <div class="flex items-center justify-start px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900 uppercase">
                                    {{ __('Kriteria Carian Tapak Pelupusan Sampah') }}</h3>
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white shadow sm:p-6">

                            <div class="grid grid-cols-6 gap-6">
                                
                                <div class="col-span-6 sm:col-span-4 md:col-span-4">
                                    <x-jet-label for="nama" value="{{ __('Nama') }}" />
                                    <x-jet-input id="nama" type="text" class="block w-full mt-1" autocomplete="off" name="nama"
                                        value="{{ request()->get('nama') }}" />
                                    <x-jet-input-error for="nama" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                    <x-jet-label for="kaedah_pelupusan" value="{{ __('Kaedah Pelupusan') }}" />
                                    <select wire:model="kaedah_pelupusan" name="kaedah_pelupusan" id="kaedah_pelupusan" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                                        <option value="">{{ __('Sila Pilih') }}</option>
                                        @foreach (App\Models\TapakPelupusanSampahs::KAEDAHPELUPUSAN as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="kaedah_pelupusan" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                    <x-jet-label for="aktif" value="{{ __('Status') }}" />
                                    <select name="aktif" id="aktif" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="1" {{ request()->get('aktif') == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ request()->get('aktif') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    <x-jet-input-error for="aktif" class="mt-2" />
                                </div>

                            </div>
                            
                        </div>

                        <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                            <x-button.button-link-secondary type=bordered class="px-4 py-2" href="{{ route('setup.tapak_pelupusan_sampah.create' ) }}">
                                <x-icons.plus class="w-4 h-4" stroke="currentColor"></x-icons.plus> <span class="self-center mx-2">{{__('Tapak Pelupusan Sampah Baru') }} </span> 
                            </x-button.button-link-secondary>

                            <x-jet-button>
                                <x-icons.search stroke="currentColor" class="w-4 h-4"></x-icons.search><span class="self-center mx-2">{{__('Cari') }} </span> 
                            </x-jet-button>
                        </div>

                    </form> 
                    
                </div>
                
            </div>
        </div>
    </div>

    <div class="pb-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="px-4 py-5 bg-white sm:p-6">
                    <x-table class="mb-4 sm:rounded-sm">
                        <x-slot name="head">
                            <x-table.heading sortable> Kod </x-table.heading>
                            <x-table.heading sortable> Nama </x-table.heading>
                            <x-table.heading sortable> Status  </x-table.heading>
                            <x-table.heading>  </x-table.heading>
                        </x-slot>
                        
                        <x-slot name="body">

                            @forelse ($tapak_pelupusan_sampahs as $item)
                                <x-table.row>
                                    <x-table.cell> 
                                        {{ $item->nama_tempat }}
                                    </x-table.cell>

                                    <x-table.cell> 
                                        {{ $item->kaedah_pelupusan }}
                                    </x-table.cell>

                                    <x-table.cell> 
                                        <span style = "background-color: {{ $item->aktif_color }}"
                                            class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium leading-4 capitalize">
                                            {{ $item->aktif_desc }} 
                                        </span>
                                    </x-table.cell>
                                    
                                    <x-table.cell class="text-end">
                                        <x-button.button-link type="editIcon" href="{{ route('setup.tapak_pelupusan_sampah.edit', $item->kod ) }}"><x-icons.pencil class="w-4 h-4" stroke="blue"></x-icons.pencil> </x-button.button-link>
                                        {{-- @if ( $item->aktif_desc === 'Aktif' )
                                            <x-button.button-link type="deleteIcon" href="#" data-modal-target="#deleteConfirmationModal" data-modal-toggle="deleteConfirmationModal" 
                                                onclick="window.livewire.emit('delete-confirmation-modal', '\\\App\\\Models\\\Tapak Pelupusan Sampah', 'kod', '{{ $item->kod }}', '', '{{ $item->nama }}' )"> 
                                                <x-icons.trash class="w-4 h-4" stroke="red"></x-icons.trash>
                                            </x-button.button-link>
                                        @endif --}}
                                    </x-table.cell>
                                </x-table.row>
                            @empty
                                <x-table.row>
                                    <x-table.cell colspan=2> 
                                        <span class="text-center">{{ __('Tiada rekod.') }}</span>
                                    </x-table.cell>
                                </x-table.row>
                            @endforelse
                            
                        </x-slot>
                        
                    </x-table>
                    
                    {{ $tapak_pelupusan_sampahs->links() }}
                </div>
                

            </div>
        </div>
        
    </div>

</x-app-layout> 