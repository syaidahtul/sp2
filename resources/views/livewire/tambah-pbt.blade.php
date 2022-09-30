<div class="py-5 bg-white sm:p-6 lg:px-0">

    <x-table class="mb-4 sm:rounded-sm">

        <x-slot name="head">
            <x-table.heading class="text-start"> PBT </x-table.heading>

            <x-table.heading> </x-table.heading>
        </x-slot>

        <x-slot name="body">

            @foreach ($selectedPbt as $index => $item)
                <x-table.row>
                    <x-table.cell>
                        <x-input.select id="selectedPbt.{{ $index }}.kod_pbt"
                            name="selectedPbt[{{ $index }}][kod_pbt]"
                            wire:model="selectedPbt.{{ $index }}.kod_pbt">
                            @foreach ($pbts as $pbt)
                                <option value="{{ $pbt->kod }}">{{ $pbt->nama_pbt }}</option>
                            @endforeach
                        </x-input.select>
                    </x-table.cell>
                    <x-table.cell class="text-end">
                        <x-button.button-link type="deleteIcon" href="#" wire:click.prevent="deletePbt({{ $index }})">
                            <x-icons.trash class="w-4 h-4" stroke="red"></x-icons.trash>
                        </x-button.button-link>
                    </x-table.cell>
                </x-table.row>
            @endforeach

        </x-slot>

    </x-table>

    <div class="flex items-center justify-end pt-3 text-right bg-transparent sm:px-6 lg:px-0 ">
        <x-button.button-link-secondary type=bordered class="p-2" href="#" wire:click.prevent="addPbt">
            <span class="self-center mx-2">{{ __('Tambah PBT') }} </span>
        </x-button.button-link-secondary>
    </div>

</div>
