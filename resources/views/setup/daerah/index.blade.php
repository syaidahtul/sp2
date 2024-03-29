<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Senarai Daerah') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white border border-gray-100 shadow-sm rounded-md sm:rounded-lg">

                <div class="mt-5 md:mt-0 md:col-span-2">

                    <form wire:submit.prevent="submit">

                        <div class="flex items-center justify-start px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900 uppercase">
                                    {{ __('Kriteria Carian Daerah') }}</h3>
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white shadow sm:p-6">

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                    <x-jet-label for="kod" value="{{ __('Kod') }}" />
                                    <x-jet-input id="kod" type="text" class="block w-full mt-1"
                                        autocomplete="off" name="kod" value="{{ request()->get('kod') }}" />
                                    <x-jet-input-error for="kod" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-4">
                                    <x-jet-label for="nama" value="{{ __('Nama') }}" />
                                    <x-jet-input id="nama" type="text" class="block w-full mt-1" autocomplete="off" name="nama"
                                        value="{{ request()->get('nama') }}" />
                                    <x-jet-input-error for="nama" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                    <x-jet-label for="aktif" value="{{ __('Status') }}" />
                                    <x-input.select name="aktif" id="aktif" >
                                        <option value="1" {{ request()->get('aktif') == '1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ request()->get('aktif') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                    </x-input.select>
                                    <x-jet-input-error for="aktif" class="mt-2" />
                                </div>

                            </div>

                        </div>

                        <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                            <x-button.button-link-secondary type=bordered class="px-4 py-2" href="{{ route('setup.daerah.create' ) }}">
                                <x-icons.plus class="w-4 h-4" stroke="currentColor"></x-icons.plus> <span class="self-center mx-2">{{__('Daerah Baru') }} </span>
                            </x-button.button-link-secondary>

                            <x-jet-button>
                                <x-icons.search stroke="currentColor" class="w-4 h-4"></x-icons.search><span class="self-center mx-2">{{__('Cari') }} </span>
                            </x-jet-button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    <div class="pb-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white border border-gray-100 shadow-sm rounded-md sm:rounded-lg">

                <div class="px-4 py-5 bg-white sm:p-6">
                    <x-table class="mb-4 sm:rounded-sm">
                        <x-slot name="head">
                            <x-table.heading> Kod </x-table.heading>
                            <x-table.heading> Nama </x-table.heading>
                            <x-table.heading> Status  </x-table.heading>
                            <x-table.heading>  </x-table.heading>
                        </x-slot>

                        <x-slot name="body">

                            @forelse ($daerahs as $item)
                                <x-table.row>
                                    <x-table.cell class="text-center">
                                        {{ $item->kod }}
                                    </x-table.cell>

                                    <x-table.cell>
                                        {{ $item->nama }}
                                    </x-table.cell>

                                    <x-table.cell class="text-center">
                                        <span style = "background-color: {{ $item->aktif_color }}"
                                            class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium leading-4 capitalize">
                                            {{ $item->aktif_desc }}
                                        </span>
                                    </x-table.cell>

                                    <x-table.cell class="text-end">
                                        <x-button.button-link type="editIcon" href="{{ route('setup.daerah.edit', $item->kod ) }}"><x-icons.pencil class="w-4 h-4" stroke="blue"></x-icons.pencil> </x-button.button-link>
                                    </x-table.cell>
                                </x-table.row>
                            @empty
                                <x-table.row>
                                    <x-table.cell colspan=2>
                                        <span class="text-center">{{ __('Tiada rekod.') }}</span>
                                    </x-table.cell>
                                </x-table.row>
                            @endforelse

                        </x-slot>

                    </x-table>

                    {{ $daerahs->links() }}
                </div>


            </div>
        </div>

    </div>

</x-app-layout>
