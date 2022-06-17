

    <div class="py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        
        <div class="overflow-hidden bg-white border shadow-xl sm:rounded-lg">

            <div class="mt-5 md:mt-0 md:col-span-2">
                
                <form wire:submit.prevent="create">
                    
                    <div class="flex items-center justify-start px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium text-gray-900 uppercase">{{ __('Template Laporan') }}</h3>
                        </div>
                    </div>
                    
                    <div class="px-4 py-5 bg-white shadow sm:p-6">
                        
                        <div class="grid grid-cols-6 gap-6">
            
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
            
                            <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                <x-jet-label for="month" value="{{ __('Bulan') }}" />
                                <x-jet-input type="month" class="w-full mt-1 text-sm" wire:model.defer="month"></x-jet-input>
                                <x-jet-input-error for="month" class="mt-2" />
                            </div>
                            
                        </div>
                    </div>
            
                    <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        <x-jet-button type="submit">+ {{ __('Jana Template Laporan Operasi') }}</x-button.primary>
                        <x-jet-button type="button">
                            {{ __('Cari') }}
                        </x-jet-button>
                    </div>
                    
                </form>
                
            </div>
        </div>
    
        <!-- Save Transaction Modal -->
        <form wire:submit.prevent="janaTemplateLaporan">
            <x-jet-dialog-modal wire:model.defer="generateNewModal">
                <x-slot name="title">Jana Template Laporan</x-slot>
                
                <x-slot name="content">
                    
                    <div class="grid grid-flow-col grid-cols-4 gap-6 py-3">
                                       
                        <div class="col-span-6 sm:col-span-4 md:col-span-2">
                            <x-jet-label for="jenisOperasiBaru" value="{{ __('Jenis Operasi') }}" />
                            <select wire:model.defer="jenisOperasiBaru" name="jenisOperasiBaru" id="jenisOperasiBaru" 
                                class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                                <option value="">{{ __('Sila Pilih') }}</option>
                                @foreach ($jenisOperasis as $item)
                                    <option value="{{ $item->kod }}"> {{ $item->keterangan }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="jenisOperasiBaru" class="mt-2" />
                        </div>
                        
                        <div class="col-span-6 sm:col-span-4 md:col-span-2">
                            <x-jet-label for="bulanBaru" value="{{ __('Bulan') }}" />
                            <x-jet-input type="month" wire:model.defer="bulanBaru"></x-jet-input>
                            <x-jet-input-error for="bulanBaru" class="mt-2" />
                        </div>
                        
                    </div>
                    
                </x-slot>
    
                <x-slot name="footer">
                    <div class="gap-6">
                        <x-button.button-link-secondary wire:click="$set('generateNewModal', false)">{{ __('Cancel') }}</x-button.secondary>
        
                        <x-jet-button type="submit">{{ __('Save') }}</x-button.primary>
                    </div>
                </x-slot>
                
            </x-jet-dialog-modal>
        </form>
        
    </div>