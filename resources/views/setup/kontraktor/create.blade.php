<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kontraktor Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-11/12 mx-auto overflow-hidden sm:rounded-lg">

                <form action="{{ route('setup.kontraktor.store') }}" method="post">
                    @csrf

                    <div class="px-4 py-5 bg-white shadow sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4 md:col-span-3">
                                <x-jet-label for="nama" value="{{ __('Nama Syarikat') }}" class="mandatory"/>
                                <x-jet-input id="nama" class="block w-full mt-1" type="text" name="nama"
                                    :value="old('nama')" autofocus autocomplete="off" />
                                <x-jet-input-error for="nama" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                                <x-jet-label for="no_lesen" value="{{ __('No. Lesen (sekiranya berkenaan)') }}" />
                                <x-jet-input id="no_lesen" type="text" class="block w-full mt-1" name="no_lesen" :value="old('no_lesen')" />
                                <x-jet-input-error for="no_lesen" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-1">
                                <x-jet-label for="status" value="{{ __('Status') }}" />
                                <select wire:model="status" name="status" id="status" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach (App\Models\Kontraktor::STATUSES as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="status" class="mt-2" />
                            </div>

                            <div class="col-span-6 row-span-2 rounded-lg sm:col-span-4 md:col-span-6">
                                <x-jet-label for="alamat" value="{{ __('Alamat') }}" />
                                <textarea id="alamat"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="alamat"> {{ old('alamat') }}</textarea>
                                <x-jet-input-error for="alamat" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                                <x-jet-label for="poskod" value="{{ __('Poskod') }}" />
                                <x-jet-input id="poskod" type="text" class="block w-full mt-1" name="poskod" :value="old('poskod')" />
                                <x-jet-input-error for="poskod" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                                <x-jet-label for="region" value="{{ __('Daerah') }}" />
                                <select name="region" id="region" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach ($daerahs as $item)
                                        <option value="{{ $item->kod }}" {{ old('region') === $item->kod ? 'selected' : '' }}> {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="region" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                                <x-jet-label for="state" value="{{ __('Negeri') }}" />
                                <select name="state" id="state" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach (App\Models\Daerah::NEGERI as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="state" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-3">
                                <x-jet-label for="no_tel_office" value="{{ __('No Telefon') }}" />
                                <x-jet-input id="no_tel_office" type="text" class="block w-full mt-1" name="no_tel_office"  :value="old('no_tel_office')"/>
                                <x-jet-input-error for="no_tel_office" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-3">
                                <x-jet-label for="no_fax_office" value="{{ __('No Fax') }}" />
                                <x-jet-input id="no_fax_office" type="text" class="block w-full mt-1" name="no_fax_office"  :value="old('no_fax_office')"/>
                                <x-jet-input-error for="no_fax_office" class="mt-2" />
                            </div>
                            
                        </div>
                        
                        <x-jet-section-border />

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 row-span-2 rounded-lg sm:col-span-4 md:col-span-6">
                                <x-jet-label for="catatan" value="{{ __('Catatan') }}" />
                                <textarea id="catatan"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="catatan"> {{ old('alamat') }}</textarea>
                                <x-jet-input-error for="catatan" class="mt-2" />
                            </div>
                            
                        </div>
                        
                        <x-jet-section-border />

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4 md:col-span-4">
                                <x-jet-label for="contact_person_nama" value="{{ __('Nama Orang Perhubungan') }}" />
                                <x-jet-input id="contact_person_nama" class="block w-full mt-1" type="text" name="contact_person_nama"
                                    :value="old('contact_person_nama')" autofocus autocomplete="off" />
                                <x-jet-input-error for="contact_person_nama" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                <x-jet-label for="contact_person_no_tel" value="{{ __('No Tel Orang Perhubungan') }}" />
                                <x-jet-input id="contact_person_no_tel" class="block w-full mt-1" type="text" name="contact_person_no_tel"
                                    :value="old('contact_person_no_tel')" autofocus autocomplete="off" />
                                <x-jet-input-error for="contact_person_no_tel" class="mt-2" />
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        <x-button.button-link-secondary href="{{ route('setup.kontraktor.index' ) }}" svgClass="w-4 h-4 mr-2" type="backIcon" stroke="currentColor">
                            <span class="self-center mx-4">{{__('Kembali') }} </span>
                        </x-button.button-link-secondary>

                        <x-jet-button>
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>