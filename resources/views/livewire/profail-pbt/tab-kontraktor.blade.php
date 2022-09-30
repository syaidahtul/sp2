<div>
    <x-table class="mb-4 sm:rounded-sm">

        <x-slot name="head">
            <x-table.heading sortable> Nama Syarikat/Kontraktor </x-table.heading>
            <x-table.heading sortable> No Kontrak </x-table.heading>
            <x-table.heading sortable> Tarikh Mula  </x-table.heading>
            <x-table.heading sortable> Tarikh Tamat  </x-table.heading>
            <x-table.heading sortable> Catatan </x-table.heading>
            <x-table.heading> </x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse ($pbt->kontraktors as $kontraktor)
                <x-table.row>
                    <x-table.cell>
                        {{ $kontraktor->nama }}
                        <p class="mt-2 text-sm text-gray-500">{{ $kontraktor->catatan }}</p>
                    </x-table.cell>
                    <x-table.cell>
                        {{ $kontraktor->pivot->no_kontrak }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $kontraktor->pivot->tarikh_mula }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $kontraktor->pivot->tarikh_tamat }}
                    </x-table.cell>
                    <x-table.cell>
                        {{ $kontraktor->pivot->catatan }}
                    </x-table.cell>
                    <x-table.cell>
                        <x-table.cell class="text-end">
                            <!--EDIT KONTRAK-->
                            <x-button.button-link type="editIcon" href="#">
                                <x-icons.pencil class="w-4 h-4" stroke="blue"></x-icons.pencil>
                            </x-button.button-link>
                        </x-table.cell>
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

</div>
