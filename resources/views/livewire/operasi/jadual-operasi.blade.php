<div>

    <div class="flex justify-start w-full p-8 overflow-hidden rounded-t-lg">

        <form wire:submit.prevent="save" class="w-full">
            <div class="grid gap-4 md:p-4 xs:grid-cols-1 md:grid-cols-6">
                @hasrole('ADMIN')
                <div class="inline-flex">
                    <label for="kod_pbt" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Nama PBT
                    </label>
                </div>
                <div class="md:col-span-5">
                    <x-input.select wire:model="filters.kod_pbt" id="kod_pbt" placeholder="Sila Pilih">
                        @foreach ($pbts as $item)
                            <option value="{{ $item->kod }}"> {{ $item->nama_pbt }}</option>
                        @endforeach
                    </x-input.select>
                </div>
                @endhasrole

                <div class="">
                    <label for="kod_pbt" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Jenis Operasi
                    </label>
                </div>
                <div class="md:col-span-2 ">
                    <x-input.text wire:model="filters.jenis_operasi" id="jenis_operasi" />
                </div>

                <div class="">
                    <label for="kod_pbt" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                        Bulan
                    </label>
                </div>

                <div class="md:col-span-2 ">
                    <x-jet-input id="tarikh_tamat" class="block w-full mt-1" type="date"
                        wire:model="filters.bulan" autofocus autocomplete="off" />
                    <x-jet-input-error for="tarikh_tamat" class="mt-2" />
                </div>
            </div>

        </form>

    </div>

    <x-table class="mb-4 sm:rounded-sm">

        <x-slot name="head">
            <x-table.heading sortable wire:click="sortBy('lokasis.nama_lokasi')" :direction="$sorts['lokasis.nama_lokasi'] ?? null"> Nama Lokasi </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('operasi_pbts.tarikh_operasi_mula')" :direction="$sorts['operasi_pbts.tarikh_operasi_mula'] ?? null"> Tarikh Mula Operasi  </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('operasi_pbts.tarikh_operasi_tamat')" :direction="$sorts['operasi_pbts.tarikh_operasi_tamat'] ?? null"> Peratus Kemajuan </x-table.heading>
            <x-table.heading sortable wire:click="sortBy('operasi_pbts.peratus_kemajuan')" :direction="$sorts['operasi_pbts.peratus_kemajuan'] ?? null"> Status  </x-table.heading>
            <x-table.heading sortable> Catatan  </x-table.heading>
            <x-table.heading> </x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse ($rows as $row)
                <x-table.row>
                    <x-table.cell>
                        <span>{{ $row->nama_lokasi }}</span>
                    </x-table.cell>
                    <x-table.cell class="text-center">
                        <span>{{ $row->tarikh_operasi_mula }}
                        {{ $row->tarikh_operasi_tamat ? ' - ' . $row->tarikh_operasi_tamat : '' }}</span>
                    </x-table.cell>
                    <x-table.cell class="text-center">
                        <span>{{ $row->peratus_kemajuan }}</span>
                    </x-table.cell>
                    <x-table.cell class="text-center">
                        <span class="px-2 py-1 rounded-md text-center {{ $row->status_operasi_color }}">{{ $row->status_operasi }}</span>
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
