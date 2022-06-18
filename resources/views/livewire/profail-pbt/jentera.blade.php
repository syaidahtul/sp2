<div>
    
    <div class="grid grid-flow-col grid-cols-6 gap-6 py-3 grid-row-3">
            
        <div class="col-span-6 md:col-start-1 sm:col-span-4 md:col-span-2">
            <x-jet-label for="namaLokasi" value="{{ __('No Pendaftaran') }}" />
            <x-jet-input id="namaLokasi" type="text" class="block w-full mt-1 text-sm" wire:model="namaLokasi"/>
            <x-jet-input-error for="namaLokasi" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4 md:col-span-2">
            <x-jet-label for="jenisJentera" value="{{ __('Jenis Jentera') }}" />
            <select wire:model="jenisJentera" name="jenisJentera" id="jenisJentera" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                <option value="">{{ __('Sila Pilih') }}</option>
                @foreach ($jenisjenteras as $item)
                    <option value="{{ $item->id }}"> {{ $item->keterangan }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="jenisJentera" class="mt-2" />
        </div>
        
        <div class="col-span-6 sm:col-span-4 md:col-span-1">
            <x-jet-label for="jenisKawasan" value="{{ __('Status') }}" />
            <select wire:model="jenisKawasan" name="jenisKawasan" id="jenisKawasan" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                <option value="">{{ __('Sila Pilih') }}</option>
                <option value="aktif">Aktif</option>
                <option value="tidak_aktif">Tidak Aktif</option>
            </select>
            <x-jet-input-error for="jenisKawasan" class="mt-2" />
        </div>
        
        <div class="col-span-1 sm:col-span-4 md:col-span-1" style="text-align-last: end;align-self: end;">
            <button type="button"  wire:click="create" title="Tambah jentera baru"
                class="inline-flex items-center px-4 py-2 font-semibold tracking-widest text-gray-600 uppercase transition border border-transparent rounded-md bg-sky-300 hover:bg-sky-600 hover:text-xl hover:text-white active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                +
            </button>
        </div>
        
    </div>
    
    <x-table class="">
                                
        <x-slot name="head">
            <x-table.heading sortable> No. Pendaftaran </x-table.heading>
            <x-table.heading sortable> Jenis Jentera </x-table.heading>
            <x-table.heading sortable> Tarikh Perolehan (Tahun Pengunaan)  </x-table.heading>
            <x-table.heading sortable>   </x-table.heading>
            <x-table.heading sortable> Status Jentera  </x-table.heading>
            <x-table.heading> </x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse ($jenteras as $jentera)
                <x-table.row>
                    <x-table.cell> 
                        {{ $jentera->nama }}
                    </x-table.cell>
                    <x-table.cell> 
                        {{ $jentera->kod_jenis_jentera }} 
                    </x-table.cell>
                    <x-table.cell> 
                        {{ $jentera->status }} 
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
    
    
    <form wire:submit.prevent="save">
        <x-jet-dialog-modal wire:model.defer="showEditModal">
            <x-slot name="title">Jentera</x-slot>

            <x-slot name="content">
            
                <div class="grid grid-flow-col grid-cols-4 gap-6 py-3">
                    <div class="col-span-6 md:col-start-1 sm:col-span-4 md:col-span-2">
                        <x-jet-label for="namaLokasi" value="{{ __('No Pendaftaran') }}" />
                        <x-jet-input id="namaLokasi" type="text" class="block w-full mt-1 text-sm" wire:model="editing.no_pendaftaran"/>
                        <x-jet-input-error for="namaLokasi" class="mt-2" />
                    </div>
                    
                    <div class="col-span-6 sm:col-span-4 md:col-span-2">
                        <x-jet-label for="jenisJentera" value="{{ __('Jenis Jentera') }}" />
                        <select wire:model="jenisJentera" name="jenisJentera" id="jenisJentera" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                            <option value="">{{ __('Sila Pilih') }}</option>
                            @foreach ($jenisjenteras as $item)
                                <option value="{{ $item->id }}"> {{ $item->keterangan }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="jenisJentera" class="mt-2" />
                    </div>
                    
                    <div class="col-span-6 sm:col-span-4 md:col-span-1">
                        <x-jet-label for="jenisKawasan" value="{{ __('Status') }}" />
                        <select wire:model="jenisKawasan" name="jenisKawasan" id="jenisKawasan" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                            <option value="">{{ __('Sila Pilih') }}</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </select>
                        <x-jet-input-error for="jenisKawasan" class="mt-2" />
                    </div>

                    <div class="col-sm-10">
                        <input type="file" wire:model="documents" id="documents" class="form-control @error('documents') is-invalid @enderror">
                        <div wire:loading wire:target="documents">
                            <span class="my-2 small">Uploading ... </span>
                        </div>
                        @error('documents') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                    </div>
                    
                </div>
                
                
            </x-slot>
            
            <x-slot name="footer">
                
                <div class="gap-6">
                    <x-button.button-link-secondary wire:click="$set('showEditModal', false)">{{ __('Cancel') }}</x-button.secondary>
    
                    <x-jet-button type="submit">{{ __('Save') }}</x-button.primary>
                </div>
                
            </x-slot>
            
        </x-jet-dialog-modal>
    </form>
    
</div>
