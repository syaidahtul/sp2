<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Senarai PBT') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="px-4bg-white sm:p-6">
                
                    <a href="{{ route('setup.pbt.create') }}"
                        class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-500 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'>{{
                        __('PTB Baru') }}</a>

                </div>

                <div class="px-4 py-5 bg-white sm:p-6">
                    <x-table class="">
                        <x-slot name="head">
                            <x-table.heading sortable> Kod PBT </x-table.heading>
                            <x-table.heading sortable> Nama </x-table.heading>
                            <x-table.heading sortable> Status  </x-table.heading>
                            <x-table.heading>   </x-table.heading>
                        </x-slot>
                        
                        <x-slot name="body">

                            @forelse ($pbts as $pbt)
                                <x-table.row>
                                    <x-table.cell> 
                                        {{ $pbt->kod }}
                                    </x-table.cell>
                                    <x-table.cell> 
                                        {{ $pbt->nama_pbt }} 
                                    </x-table.cell>
                                    <x-table.cell> 
                                        <span style = "background-color: {{ $pbt->active_color }}"
                                            class="inline-flex items-center px-2.5 py-1.5 rounded-full text-sm font-medium leading-4 capitalize">
                                            {{ $pbt->active_desc }} 
                                        </span>
                                    </x-table.cell>
                                    <x-table.cell class="text-center">
                                            <a href="{{ route('setup.pbt.view', $pbt ) }}"
                                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-600 uppercase transition bg-green-300 border border-transparent rounded-md hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('setup.pbt.edit', $pbt ) }}"
                                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-600 uppercase transition bg-yellow-300 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                            <button type="button"
                                                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-600 uppercase transition bg-red-300 border border-transparent rounded-md hover:bg-red-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'"
                                                data-modal-toggle="deleteConfirmationModal" onclick="window.livewire.emit('delete-confirmation-modal', 'App\\Models\\Pbt', 'kod', '{{ $pbt->kod_pbt }}', '' )">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
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