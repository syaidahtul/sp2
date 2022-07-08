<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('PBT Kontraktor') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-11/12 mx-auto overflow-hidden sm:rounded-lg">

                    <div class="px-4 py-5 bg-white shadow sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4 md:col-span-3">
                                <x-jet-label for="nama" value="{{ __('Nama Syarikat') }}" class="mandatory" />
                                <x-jet-input id="nama" class="block w-full mt-1 bg-gray-100" type="text"
                                    name="nama" disabled :value="$kontraktor->nama" autofocus autocomplete="off" />
                                <x-jet-input-error for="nama" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-2">
                                <x-jet-label for="no_lesen" value="{{ __('No. Lesen (sekiranya berkenaan)') }}" />
                                <x-jet-input id="no_lesen" type="text" class="block w-full mt-1 bg-gray-100"
                                    name="no_lesen" :value="$kontraktor->no_lesen" disabled />
                                <x-jet-input-error for="no_lesen" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-2 md:col-span-1">
                                <x-jet-label for="status" value="{{ __('Status') }}" class="mandatory" />
                                <x-jet-input id="poskod" type="text" class="block w-full mt-1 bg-gray-100"
                                    name="poskod" :value="$kontraktor->status_desc" disabled />
                                <x-jet-input-error for="status" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 md:col-span-4">
                                <x-jet-label for="contact_person_nama" value="{{ __('Nama Orang Perhubungan') }}" />
                                <x-jet-input id="contact_person_nama" class="block w-full mt-1 bg-gray-100"
                                    type="text" name="contact_person_nama" :value="$kontraktor->contact_person_nama" autofocus
                                    autocomplete="off" disabled />
                                <x-jet-input-error for="contact_person_nama" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                <x-jet-label for="contact_person_no_tel"
                                    value="{{ __('No Tel Orang Perhubungan') }}" />
                                <x-jet-input id="contact_person_no_tel" class="block w-full mt-1 bg-gray-100"
                                    type="text" name="contact_person_no_tel" :value="$kontraktor->contact_person_no_tel" autofocus
                                    autocomplete="off" disabled />
                                <x-jet-input-error for="contact_person_no_tel" class="mt-2" />
                            </div>

                        </div>

                        <x-jet-section-border />
                        
                        <form action="{{ route('setup.kontraktor.storePbtKontraktor', $kontraktor) }}" method="post">
                            @csrf
                            
                            <div class="grid grid-cols-6 gap-6 px-4 py-5 bg-white shadow sm:p-6">
                                <input type="hidden" name="kontraktor_id" value={{ $kontraktor->id }}>
                                <div class="col-span-6 sm:col-span-4 md:col-span-3">
                                    <x-jet-label for="kod_pbt" value="{{ __('PBT') }}" class="mandatory" />
                                    <select name="kod_pbt" id="kod_pbt"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                                        <option value="">{{ __('Sila Pilih') }}</option>
                                         @foreach ($pbts as $item)
                                        <option value="{{ $item->kod }}"
                                            {{ old('kod_pbt') === $item->kod ? 'selected' : '' }}>
                                            {{ $item->nama_pbt }} ({{ $item->kod }})</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="kod_pbt" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                    <x-jet-label for="no_kontrak" value="{{ __('No Kontrak') }}" class="mandatory" />
                                    <x-jet-input id="no_kontrak" class="block w-full mt-1" type="text"
                                        name="no_kontrak" :value="old('no_kontrak')" autofocus autocomplete="off" />
                                    <x-jet-input-error for="no_kontrak" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                    <x-jet-label for="status_perkhidmatan" value="{{ __('Status') }}" class="mandatory" />
                                    <select name="status_perkhidmatan" id="status_perkhidmatan" class="w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach (App\Models\PbtKontraktors::STATUSPERKHIDMATAN as $value)
                                            <option value="{{ $value }}" {{ old('status_perkhidmatan') === $value ? 'selected' : ''}}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="status_perkhidmatan" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-3">
                                    <x-jet-label for="tarikh_mula" value="{{ __('Tarikh Mula') }}" class="mandatory" />
                                    <x-jet-input id="tarikh_mula" class="block w-full mt-1" type="date"
                                        name="tarikh_mula" :value="old('tarikh_mula')" autofocus autocomplete="off" />
                                    <x-jet-input-error for="tarikh_mula" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-3">
                                    <x-jet-label for="tarikh_tamat" value="{{ __('Tarikh Tamat') }}" class="mandatory" />
                                    <x-jet-input id="tarikh_tamat" class="block w-full mt-1" type="date"
                                        name="tarikh_tamat" :value="old('tarikh_tamat')" autofocus autocomplete="off" />
                                    <x-jet-input-error for="tarikh_tamat" class="mt-2" />
                                </div>
                                

                                <div class="col-span-6 row-span-2 rounded-lg sm:col-span-4 md:col-span-6">
                                    <x-jet-label for="catatan" value="{{ __('Catatan') }}" />
                                    <textarea id="catatan"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="catatan"> {{ old('catatan') }}</textarea>
                                    <x-jet-input-error for="catatan" class="mt-2" />
                                </div>
                                
                            </div>

                            <div
                                class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                                <x-jet-button>
                                    {{ __('Save') }}
                                </x-jet-button>
                            </div>

                        </form>

                        <x-jet-section-border />
                        
                        <x-table class="mb-4 sm:rounded-sm">
                            <x-slot name="head">
                                <x-table.heading sortable> PBT </x-table.heading>
                                <x-table.heading sortable> Tarikh Mula </x-table.heading>
                                <x-table.heading sortable> Tarikh Tamat </x-table.heading>
                                <x-table.heading sortable> Status  </x-table.heading>
                                <x-table.heading>  </x-table.heading>
                            </x-slot>
                            
                            <x-slot name="body">
                                
                                @forelse ($pbtKontraktor as $item)
                                    <x-table.row>
                                        <x-table.cell> 
                                            {{ $item->nama_pbt }}
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
                                                {{ $item->status_desc }} 
                                            </span>
                                        </x-table.cell>
                                        
                                        <x-table.cell class="text-end">
                                            
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

                    <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        <x-button.button-link-secondary href="{{ route('setup.kontraktor.index') }}"
                            svgClass="w-4 h-4 mr-2" type="backIcon" stroke="currentColor">
                            <span class="self-center mx-4">{{ __('Kembali') }} </span>
                        </x-button.button-link-secondary>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
