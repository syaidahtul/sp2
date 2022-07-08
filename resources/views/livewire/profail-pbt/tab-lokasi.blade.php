<div wire:ignore.self> 
    
    
        <div class="grid grid-flow-col grid-cols-6 gap-6 py-3 grid-row-3">
            
            <div class="col-span-6 md:col-start-1 sm:col-span-4 md:col-span-2">
                <x-jet-label for="namaLokasi" value="{{ __('Nama Lokasi') }}" />
                <x-jet-input id="namaLokasi" type="text" class="block w-full mt-1 text-sm" wire:model="namaLokasi"/>
                <x-jet-input-error for="namaLokasi" class="mt-2" />
            </div>
            
            <div class="col-span-6 sm:col-span-4 md:col-span-2">
                <x-jet-label for="jenisOperasi" value="{{ __('Jenis Operasi') }}" />
                <select wire:model="jenisOperasi" name="jenisOperasi" id="jenisOperasi" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                    <option value="">{{ __('Sila Pilih') }}</option>
                    @foreach ($jenisOperasis as $item)
                        <option value="{{ $item->kod }}"> {{ $item->keterangan }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="jenisOperasi" class="mt-2" />
            </div>
            
            <div class="col-span-6 sm:col-span-4 md:col-span-1">
                <x-jet-label for="jenisKawasan" value="{{ __('Jenis Kawasan') }}" />
                <select wire:model="jenisKawasan" name="jenisKawasan" id="jenisKawasan" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                    <option value="">{{ __('Sila Pilih') }}</option>
                    @foreach ($jenisKawasans as $item)
                        <option value="{{ $item->kod }}"> {{ $item->keterangan }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="jenisKawasan" class="mt-2" />
            </div>
            
            <div class="col-span-1 sm:col-span-4 md:col-span-1" style="text-align-last: end;align-self: end;">
                <button type="button"  wire:click="create" title="Tambah lokasi baru"
                    class="inline-flex items-center px-4 py-2 font-semibold tracking-widest text-gray-600 uppercase transition border border-transparent rounded-md bg-sky-300 hover:bg-sky-600 hover:text-xl hover:text-white active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                    +
                </button>
            </div>
            
        </div>

        <x-table wire:ignore.self class="my-4 rounded-md">
                            
            <x-slot name="head">
                <x-table.heading sortable> No </x-table.heading>
                <x-table.heading sortable> Nama Lokasi </x-table.heading>
                <x-table.heading sortable> Jenis Operasi  </x-table.heading>
                <x-table.heading sortable> Jenis Kawasan  </x-table.heading>
                <x-table.heading> </x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse ($lokasis as $lokasi)
                    <x-table.row wire:loading.class="opacity-50">
                        <x-table.cell> 
                            {{ $loop->iteration }}
                        </x-table.cell>
                        <x-table.cell> 
                            {{ $lokasi->nama_lokasi }}
                        </x-table.cell>
                        <x-table.cell> 
                            {{ optional($lokasi->jenisOperasi)->keterangan }} 
                        </x-table.cell>
                        <x-table.cell> 
                            {{ optional($lokasi->jenisKawasan)->keterangan }} 
                        </x-table.cell>
                        <x-table.cell class="text-end"> 
                            <button type="button"  wire:click="edit({{ $lokasi->id }})" 
                                class="inline-flex items-center px-2 py-2 font-semibold tracking-widest text-yellow-300 uppercase transition bg-transparent border border-transparent rounded-md hover:border-yellow-600 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                            </button>
                            <button type="button"  wire:click="delete({{ $lokasi->id }})" 
                                class="inline-flex items-center px-2 py-2 font-semibold tracking-widest text-red-600 uppercase transition border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
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
                @endforelse
            </x-slot>
            
        </x-table>

        {{ $lokasis->links() }}
    
    
    <!-- Save Transaction Modal -->
    <form wire:submit.prevent="save">
        <x-jet-dialog-modal wire:model.defer="showEditModal">
            <x-slot name="title">Kemaskini Lokasi</x-slot>
            
            <x-slot name="content">
                
                <div class="grid grid-flow-col grid-cols-4 gap-6 py-3">
            
                    <div class="col-span-6 sm:col-span-4 md:col-span-2">
                        <x-jet-label for="editing.nama_lokasi" value="{{ __('Nama Lokasi') }}" />
                        <x-jet-input id="editing.nama_lokasi" type="text" class="block w-full mt-1 text-sm" wire:model.defer="editing.nama_lokasi"/>
                        <x-jet-input-error for="editing.nama_lokasi" class="mt-2" />
                    </div>
                    
                    <div class="col-span-6 sm:col-span-4 md:col-span-2">
                        <x-jet-label for="editing.kod_jenis_operasi" value="{{ __('Jenis Operasi') }}" />
                        <select wire:model.defer="editing.kod_jenis_operasi" id="editing.kod_jenis_operasi" 
                            class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                            <option value="">{{ __('Sila Pilih') }}</option>
                            @foreach ($jenisOperasis as $item)
                                <option value="{{ $item->kod }}"> {{ $item->keterangan }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="editing.kod_jenis_operasi" class="mt-2" />
                    </div>
                    
                    <div class="col-span-6 sm:col-span-4 md:col-span-2">
                        <x-jet-label for="editJenisKawasan" value="{{ __('Jenis Kawasan') }}" />
                        <select wire:model.defer="editing.kod_jenis_kawasan" id="editJenisKawasan" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                            <option value="">{{ __('Sila Pilih') }}</option>
                            @foreach ($jenisKawasans as $item)
                                <option value="{{ $item->kod }}"> {{ $item->keterangan }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="editing.kod_jenis_kawasan" class="mt-2" />
                    </div>
                    
                </div>
                
            </x-slot>

            <x-slot name="footer">
                <div class="gap-6">
                    <x-button.button-link-secondary wire:click="$set('showEditModal', false)">{{ __('Kembali') }}</x-button.secondary>
    
                    <x-jet-button type="submit">{{ __('Save') }}</x-button.primary>
                </div>
            </x-slot>
            
        </x-jet-dialog-modal>
    </form>
    
</div>
