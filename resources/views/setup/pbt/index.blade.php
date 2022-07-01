<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Senarai PBT') }}
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
                                    {{ __('Kriteria Carian PBT') }}</h3>
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white shadow sm:p-6">

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                    <x-jet-label for="kod" value="{{ __('Kod') }}" />
                                    <x-jet-input id="kod" type="text" class="block w-full mt-1"
                                        autocomplete="off" name="kod" value="{{ request()->get('name') }}" />
                                    <x-jet-input-error for="kod" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-4">
                                    <x-jet-label for="namapbt" value="{{ __('Nama') }}" />
                                    <x-jet-input id="namapbt" type="text" class="block w-full mt-1" autocomplete="off" name="namapbt"
                                        value="{{ request()->get('namapbt') }}" />
                                    <x-jet-input-error for="namapbt" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                    <x-jet-label for="aktif" value="{{ __('Aktif') }}" />
                                    <select name="aktif" id="aktif" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">Aktif</option>
                                        <option value="deactivated" {{ request()->get('aktif') == 'deactivated' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </select>
                                    <x-jet-input-error for="aktif" class="mt-2" />
                                </div>

                            </div>
                            
                        </div>

                        <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                            <x-button.button-link href="{{ route('setup.pbt.create' ) }}" type="createIcon" svgClass="w-4 h-4 mr-2"><span class="self-center mx-4">{{__('PTB Baru') }} </span> </x-button.button-link>

                            <x-jet-button>
                                {{ __('Cari') }}
                            </x-jet-button>
                        </div>

                    </form>
                    
                </div>
                
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="px-4 py-5 bg-white sm:p-6">
                    <x-table class="">
                        <x-slot name="head">
                            <x-table.heading sortable> Kod PBT </x-table.heading>
                            <x-table.heading sortable> Nama </x-table.heading>
                            <x-table.heading sortable> Status  </x-table.heading>
                            <x-table.heading>  </x-table.heading>
                        </x-slot>
                        
                        <x-slot name="body">

                            @forelse ($pbts as $pbt)
                                <x-table.row>
                                    <x-table.cell> 
                                        {{ $pbt->kod }}
                                    </x-table.cell>

                                    <x-table.cell> 
                                        <x-button.button-link type="viewIcon" href="{{ route('setup.pbt.view', $pbt ) }}" title="Profail PBT">{{ $pbt->nama_pbt }} <x-icons.eye class="w-4 h-4 mx-2" stroke="green"></x-icons.eye></x-button.button-link>
                                    </x-table.cell>

                                    <x-table.cell> 
                                        <span style = "background-color: {{ $pbt->deleted_at_color }}"
                                            class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium leading-4 capitalize">
                                            {{ $pbt->deleted_at_desc }} 
                                        </span>
                                    </x-table.cell>
                                    
                                    <x-table.cell class="text-end">
                                        <x-button.button-link type="viewIcon" href="{{ route('setup.pbt.view', $pbt ) }}"><x-icons.eye class="w-4 h-4" stroke="green"></x-icons.eye></x-button.button-link>
                                        <x-button.button-link type="editIcon" href="{{ route('setup.pbt.edit', $pbt ) }}"><x-icons.pencil class="w-4 h-4" stroke="blue"></x-icons.pencil> </x-button.button-link>
                                        @if ( $pbt->deleted_at_desc === 'Tidak Aktif' )
                                            <x-button.button-link type="restoreIcon" href="#"><x-icons.restore class="w-4 h-4" stroke="orange"></x-icons.restore> </x-button.button-link>
                                        @else
                                            <x-button.button-link type="deleteIcon" href="#" data-modal-target="#deleteConfirmationModal" data-modal-toggle="deleteConfirmationModal" 
                                                onclick="window.livewire.emit('delete-confirmation-modal', '\\\App\\\Models\\\Pbt', 'kod', '{{ $pbt->kod }}', '', '{{ $pbt->nama_pbt }}' )"> 
                                                <x-icons.trash class="w-4 h-4" stroke="red"></x-icons.trash>
                                            </x-button.button-link>
                                        @endif
                                    </x-table.cell>
                                </x-table.row>
                            @empty
                                <x-table.row colspan=2>
                                    {{ __('Tiada rekod.') }}
                                </x-table.row>
                            @endforelse
                            
                        </x-slot>
                        
                    </x-table>
                    
                    {{ $pbts->links() }}
                </div>
                

            </div>
        </div>
        
    </div>

</x-app-layout>