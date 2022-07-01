<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="block w-full mt-1" wire:model.defer="email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Identity No -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="identity_no" value="{{ __('Identity No') }}" />
            <x-jet-input id="identity_no" type="text" class="block w-full mt-1" wire:model.defer="identity_no" />
            <x-jet-input-error for="identity_no" class="mt-2" />
        </div>

        <!-- Current PBT -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_pbt" value="{{ __('Kementerian/PBT') }}" />
            <select wire:model.defer="current_pbt" id="current_pbt" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm ring-1 ring-black ring-opacity-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                <option value="">{{ __('Sila Pilih') }}</option>
                @foreach ($pbts as $item)
                    <option value="{{ $item->kod }}"> {{ $item->nama_pbt }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="current_pbt" class="mt-2" />
        </div>

        <!-- Roles -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="role" value="{{ __('Peranan') }}" />
            <select wire:model.defer="role" id="role" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm ring-1 ring-black ring-opacity-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                <option value="">{{ __('Sila Pilih') }}</option>
                @foreach ($roles as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="role" class="mt-2" />
        </div>
        
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
