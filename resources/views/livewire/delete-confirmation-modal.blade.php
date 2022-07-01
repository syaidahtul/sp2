
<div>
    <x-jet-confirmation-modal wire:model="confirmationmodal">
        <x-slot name="title">
            Hapus Rekod
        </x-slot>

        <x-slot name="content">
            Anda pasti mahu menghapuskan rekod {{ $dataForUser }}?
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmationmodal')" wire:loading.attr="disabled">
                Tidak
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="destroyRecord" wire:loading.attr="disabled">
                Hapus Rekod
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>