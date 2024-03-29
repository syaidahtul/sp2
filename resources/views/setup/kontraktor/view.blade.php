<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kemaskini Kontraktor') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-11/12 mx-auto overflow-hidden sm:rounded-lg">

                    <div class="px-4 py-5 bg-white shadow sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4 md:col-span-3">
                                <x-jet-label for="nama" value="{{ __('Nama Syarikat') }}" class="mandatory"/>
                                <x-jet-input id="nama" class="block w-full mt-1 bg-gray-100" type="text" name="nama" disabled
                                    :value="$kontraktor->nama" autofocus autocomplete="off" />
                                <x-jet-input-error for="nama" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                                <x-jet-label for="no_lesen" value="{{ __('No. Lesen (sekiranya berkenaan)') }}" />
                                <x-jet-input id="no_lesen" type="text" class="block w-full mt-1 bg-gray-100" name="no_lesen" :value="$kontraktor->no_lesen" disabled/>
                                <x-jet-input-error for="no_lesen" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-1">
                                <x-jet-label for="status" value="{{ __('Status') }}" class="mandatory"/>
                                <x-jet-input id="poskod" type="text" class="block w-full mt-1 bg-gray-100" name="poskod" :value="$kontraktor->status_desc" disabled/>
                                <x-jet-input-error for="status" class="mt-2" />
                            </div>

                            <div class="col-span-6 row-span-2 rounded-lg sm:col-span-4 md:col-span-6">
                                <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
                                <textarea id="alamat"
                                    class="block w-full mt-1 bg-gray-100 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat" disabled> {{ $kontraktor->alamat }}</textarea>
                                <x-jet-input-error for="alamat" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                                <x-jet-label for="poskod" value="{{ __('Poskod') }}" />
                                <x-jet-input id="poskod" type="text" class="block w-full mt-1 bg-gray-100" name="poskod" :value="$kontraktor->poskod" disabled/>
                                <x-jet-input-error for="poskod" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                                <x-jet-label for="region" value="{{ __('Daerah') }}" />
                                <x-jet-input id="poskod" type="text" class="block w-full mt-1 bg-gray-100" name="poskod" :value="$kontraktor->region" disabled/>
                                <x-jet-input-error for="region" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                                <x-jet-label for="state" value="{{ __('Negeri') }}" />
                                <x-jet-input id="poskod" type="text" class="block w-full mt-1 bg-gray-100" name="poskod" :value="$kontraktor->state" disabled/>
                                <x-jet-input-error for="state" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-3">
                                <x-jet-label for="no_tel_office" value="{{ __('No Telefon') }}" />
                                <x-jet-input id="no_tel_office" type="text" class="block w-full mt-1 bg-gray-100" name="no_tel_office"  :value="$kontraktor->no_tel_office" disabled/>
                                <x-jet-input-error for="no_tel_office" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-3">
                                <x-jet-label for="no_fax_office" value="{{ __('No Fax') }}" />
                                <x-jet-input id="no_fax_office" type="text" class="block w-full mt-1 bg-gray-100" name="no_fax_office"  :value="$kontraktor->no_fax_office" disabled/>
                                <x-jet-input-error for="no_fax_office" class="mt-2" />
                            </div>

                        </div>

                        <x-jet-section-border />

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4 md:col-span-4">
                                <x-jet-label for="contact_person_nama" value="{{ __('Nama Orang Perhubungan') }}" />
                                <x-jet-input id="contact_person_nama" class="block w-full mt-1 bg-gray-100" type="text" name="contact_person_nama"
                                    :value="$kontraktor->contact_person_nama" autofocus autocomplete="off" disabled/>
                                <x-jet-input-error for="contact_person_nama" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                <x-jet-label for="contact_person_no_tel" value="{{ __('No Tel Orang Perhubungan') }}" />
                                <x-jet-input id="contact_person_no_tel" class="block w-full mt-1 bg-gray-100" type="text" name="contact_person_no_tel"
                                    :value="$kontraktor->contact_person_no_tel" autofocus autocomplete="off" disabled/>
                                <x-jet-input-error for="contact_person_no_tel" class="mt-2" />
                            </div>

                        </div>



                        <x-jet-section-border />

                        <x-table class="mt-4 sm:rounded-sm">
                            <x-slot name="head">
                                <x-table.heading> PBT </x-table.heading>
                                <x-table.heading> No. Kontrak </x-table.heading>
                                <x-table.heading> Tarikh Mula </x-table.heading>
                                <x-table.heading> Tarikh Tamat </x-table.heading>
                                <x-table.heading> Status  </x-table.heading>
                                <x-table.heading>  </x-table.heading>
                            </x-slot>

                            <x-slot name="body">

                                @forelse ($kontraktor->pbtKontraktors as $item)
                                    <x-table.row>
                                        <x-table.cell>
                                            {{ $item->nama_pbt }}
                                        </x-table.cell>

                                        <x-table.cell>
                                            {{ $item->pivot->no_kontrak }}
                                        </x-table.cell>

                                        <x-table.cell class="text-center">
                                            {{ date('d-m-Y', strtotime($item->pivot->tarikh_mula)); }}
                                        </x-table.cell>

                                        <x-table.cell class="text-center">
                                            {{ date('d-m-Y', strtotime($item->pivot->tarikh_tamat)); }}
                                        </x-table.cell>

                                        <x-table.cell>
                                            <span style = "background-color: {{ $item->status_color }}"
                                                class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium leading-4 capitalize">
                                                {{ $item->status_perkhidmatan }}
                                            </span>
                                        </x-table.cell>

                                        <x-table.cell class="text-end">

                                        </x-table.cell>
                                    </x-table.row>
                                @empty
                                    <x-table.row>
                                        <x-table.cell colspan=6 class="text-center">
                                            {{ __('Tiada rekod.') }}
                                        </x-table.cell>
                                    </x-table.row>
                                @endforelse

                            </x-slot>
                        </x-table>

                    </div>

                    <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        <x-button.button-link-secondary href="{{ route('setup.kontraktor.index' ) }}" svgClass="w-4 h-4 mr-2" type="backIcon" stroke="currentColor">
                            <span class="self-center mx-4">{{__('Kembali') }} </span>
                        </x-button.button-link-secondary>
                    </div>

            </div>

        </div>
    </div>
</x-app-layout>
