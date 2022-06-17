<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Peranan Pengguna') }}
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

        <!-- Roles -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="role" value="{{ __('Peranan') }}" />
            <x-jet-input id="role" type="text" class="block w-full mt-1" wire:model.defer="role" />
            
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
