<div class="py-6 sm:py-4">

    <form wire:submit.prevent="updatePbtProfail">

        <div class="grid grid-cols-6 gap-6">
            <!-- Name -->
            <div class="col-span-6 sm:col-span-2 md:col-span-1">
                <x-jet-label for="kod_pbt" value="{{ __('Kod PBT') }}" />
                <x-jet-input id="kod_pbt" type="text" class="block w-full mt-1 bg-gray-100" disabled
                    wire:model.defer="pbt.kod" />
                <x-jet-input-error for="pbt.kod" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 md:col-span-5">
                <x-jet-label for="nama_pbt" value="{{ __('Nama') }}" />
                <x-jet-input id="nama_pbt" type="text" class="block w-full mt-1 bg-gray-100" disabled
                    wire:model.defer="pbt.nama_pbt" />
                <x-jet-input-error for="pbt.nama_pbt" class="mt-2" />
            </div>

            <div class="col-span-6 row-span-2 rounded-lg sm:col-span-4 md:col-span-6">
                <x-jet-label for="pbt.alamat" value="{{ __('Alamat') }}" />
                <textarea id="pbt.alamat"
                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    wire:model.defer="pbt.alamat"></textarea>
                <x-jet-input-error for="pbt.alamat" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                <x-jet-label for="poskod" value="{{ __('Poskod') }}" />
                <x-jet-input id="poskod" type="text" class="block w-full mt-1"
                    wire:model.defer="pbt.poskod" />
                <x-jet-input-error for="pbt.poskod" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                <x-jet-label for="region" value="{{ __('Daerah') }}" />
                <x-jet-input id="region" type="text" class="block w-full mt-1"
                    wire:model.defer="pbt.region" />
                <x-jet-input-error for="pbt.region" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                <x-jet-label for="state" value="{{ __('Negeri') }}" />
                <x-jet-input id="state" type="text" class="block w-full mt-1 bg-gray-100"
                    wire:model.defer="pbt.state" disabled />
                <x-jet-input-error for="pbt.state" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2 md:col-span-3">
                <x-jet-label for="no_tel" value="{{ __('No Telefon') }}" />
                <x-jet-input id="no_tel" type="text" class="block w-full mt-1"
                    wire:model.defer="pbt.no_tel" />
                <x-jet-input-error for="pbt.no_tel" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-2 md:col-span-3">
                <x-jet-label for="no_fax" value="{{ __('No Fax') }}" />
                <x-jet-input id="no_fax" type="text" class="block w-full mt-1"
                    wire:model.defer="pbt.no_fax" />
                <x-jet-input-error for="pbt.no_fax" class="mt-2" />
            </div>
        </div>

        <!-- action -->
        <div
            class="flex items-center justify-end pt-3 text-right">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-jet-button>
        </div>

    </form>

</div>
