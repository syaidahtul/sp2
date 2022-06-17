<div> 
    
    <form wire:submit.prevent="updatePbtProfail">
    <div class="px-4 py-5 bg-white border border-gray-200 rounded-t-lg sm:p-6">
        
        <div class="grid grid-flow-col grid-cols-6 gap-6 py-3 grid-row-3">
    
            <div class="col-span-6 sm:col-span-4 md:col-span-2">
                <x-jet-label for="kod_pbt" value="{{ __('Kod PBT') }}" />
                <x-jet-input id="kod_pbt" type="text" class="block w-full mt-1" disabled wire:model.defer="pbt.kod" />
                <x-jet-input-error for="pbt.kod" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-4 md:col-span-2">
                <x-jet-label for="role" value="{{ __(' No Telefon') }}" />
                <x-jet-input id="nama_pbt" type="text" class="block w-full mt-1" wire:model.defer="pbt.no_tel"/>
                <x-jet-input-error for="pbt.no_tel" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-4 md:col-span-2">
                <x-jet-label for="role" value="{{ __(' No Fax') }}" />
                <x-jet-input id="nama_pbt" type="text" class="block w-full mt-1" wire:model.defer="pbt.no_fax"/>
                <x-jet-input-error for="pbt.no_fax" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="nama_pbt" value="{{ __('Nama') }}" />
                <x-jet-input id="nama_pbt" type="text" class="block w-full mt-1" disabled wire:model.defer="pbt.nama_pbt"/>
                <x-jet-input-error for="pbt.nama_pbt" class="mt-2" />
            </div>
            
            <div class="col-span-6 row-span-2 row-start-2 rounded-lg sm:col-span-4">
                <x-jet-label for="pbt.alamat_line1" value="{{ __('Alamat') }}" /> 
                <textarea id="pbt.alamat_line1" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model.defer="pbt.alamat_line1"></textarea>
                <x-jet-input-error for="pbt.alamat_line1" class="mt-2" />
            </div> 
            
        </div>
        
    </div>
        
    <div class="flex items-center justify-end gap-4 px-4 py-3 text-right border-gray-200 bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
        <x-button.button-link-secondary href="{{ route('dashboard') }}">
            {{ __('Back') }}
        </x-button.button-link-secondary>
        
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>
        
        <x-jet-button wire:loading.attr="disabled" wire:target="pbt">
            {{ __('Save') }}
        </x-jet-button>
    </div>
    
    </form>
    
</div>
