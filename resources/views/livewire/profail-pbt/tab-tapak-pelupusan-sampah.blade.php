<div class="py-6 sm:py-4">

    <form wire:submit.prevent="save">

        <x-table class="sm:rounded-sm">

            <x-slot name="head">
                <x-table.heading sortable> Nama Tempat </x-table.heading>
                <x-table.heading sortable> Kaedah Pelupusan </x-table.heading>
                <x-table.heading> </x-table.heading>
                <x-table.heading> </x-table.heading>
            </x-slot>

            <x-slot name="body">
                @forelse ($tapaks as $item)
                    <x-table.row>
                        <x-table.cell>
                            {{ $item->tempat }}
                        </x-table.cell>
                        <x-table.cell>
                            {{ $item->kaedah_pelupusan_label }}
                        </x-table.cell>
                        <x-table.cell class="text-end">
                            <x-button.button-link-secondary class="px-4 py-2" href="{{ route('operasi.pengurusansampah.index', ['back','tabtapakpelupusansampah'] ) }}" svgClass="w-4 h-4">
                                <span class="self-center mx-2">{{__('Kos Pengurusan Sampah') }} </span>
                            </x-button.button-link-secondary>
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

