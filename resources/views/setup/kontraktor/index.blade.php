<x-app-layout>
    
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Senarai Kontraktor') }}
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
                                    {{ __('Kriteria Carian Kontraktor') }}</h3>
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white shadow sm:p-6">

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                    <x-jet-label for="kodpbt" value="{{ __('PBT') }}" />
                                    <select name="kodpbt" id="kodpbt" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value=""> Sila Pilih </option>
                                        @foreach ($pbts as $item)
                                            <option value="{{ $item->kod }}" {{ request()->get('kodpbt') === $item->kod ? 'selected' : '' }}> {{ $item->nama_pbt }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="kodpbt" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-3">
                                    <x-jet-label for="nama" value="{{ __('Nama Kontraktor') }}" />
                                    <x-jet-input id="nama" type="text" class="block w-full mt-1" autocomplete="off" name="nama"
                                        value="{{ request()->get('nama') }}" />
                                    <x-jet-input-error for="nama" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                    <x-jet-label for="aktif" value="{{ __('Status') }}" />
                                    <select name="aktif" id="aktif" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach (App\Models\Kontraktor::STATUSES as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="aktif" class="mt-2" />
                                </div>

                            </div>
                            
                        </div>

                        <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                            <x-button.button-link-secondary type=bordered class="px-4 py-2" href="{{ route('setup.kontraktor.create' ) }}">
                                <x-icons.plus class="w-4 h-4" stroke="currentColor"></x-icons.plus> <span class="self-center mx-2">{{__('Kontraktor Baru') }} </span> 
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
                            <x-table.heading sortable> PBT </x-table.heading>
                            <x-table.heading sortable> Nama </x-table.heading>
                            <x-table.heading sortable> Status  </x-table.heading>
                            <x-table.heading>  </x-table.heading>
                        </x-slot>
                        
                        <x-slot name="body">

                            @forelse ($kontraktors as $item)
                                <x-table.row>
                                    <x-table.cell> 
                                        @foreach ($item->pbts as $pbt)
                                            <div class="sm:py-1 md:py-2 lg:py-2">{{ $loop->iteration }}. {{ $pbt->nama_pbt }}</div>
                                        @endforeach
                                    </x-table.cell>

                                    <x-table.cell> 
                                        {{ $item->nama }}
                                    </x-table.cell>

                                    <x-table.cell> 
                                        <span style = "background-color: {{ $item->status_color }}"
                                            class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium leading-4 capitalize">
                                            {{ $item->status_desc }} 
                                        </span>
                                    </x-table.cell>
                                    
                                    <x-table.cell class="text-end">
                                        <x-button.button-link type="viewIcon" href="{{ route('setup.kontraktor.view', $item->id ) }}"><x-icons.eye class="w-4 h-4" stroke="green"></x-icons.eye> </x-button.button-link>
                                        <x-button.button-link type="editIcon" href="{{ route('setup.kontraktor.edit', $item->id ) }}"><x-icons.pencil class="w-4 h-4" stroke="blue"></x-icons.pencil> </x-button.button-link>
                                        @if ( $item->status_desc !== 'Tidak Aktif' )
                                            <x-button.button-link type="restoreIcon" href="{{ route('setup.kontraktor.addPbt', $item->id ) }}" title="Tambah PBT berkenaan"> 
                                                <x-icons.user-add class="w-4 h-4" stroke="orange"></x-icons.user-add>
                                            </x-button.button-link>
                                        @endif
                                    </x-table.cell>
                                </x-table.row>
                            @empty
                                <x-table.row>
                                    <x-table.cell colspan=3 class="text-center"> 
                                        {{ __('Tiada rekod.') }}
                                    </x-table.cell>
                                </x-table.row>
                            @endforelse
                            
                        </x-slot>
                        
                    </x-table>
                    
                    {{ $kontraktors->links() }}
                </div>
                

            </div>
        </div>
        
    </div>

</x-app-layout> 
