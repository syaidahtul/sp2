<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tapak Pelupusan Sampah Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-11/12 mx-auto overflow-hidden bg-white border border-gray-100 rounded-md shadow-sm sm:rounded-lg">

                <form action="{{ route('setup.tapak_pelupusan_sampah.store') }}" method="post">
                    @csrf

                    <div class="px-4 py-5 bg-white shadow sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4 md:col-span-5">
                                <x-jet-label for="tempat" value="{{ __('Nama Tempat') }}" />
                                <x-input.text id="tempat" class="block w-full mt-1" type="text"
                                    name="tempat" :value="old('tempat')" autofocus autocomplete="off" />
                                <x-jet-input-error for="tempat" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                <x-jet-label for="kaedah_pelupusan" value="{{ __('Kaedah Pelupusan') }}" />
                                <x-input.select name="kaedah_pelupusan" id="kaedah_pelupusan" >
                                    <option value=""> Sila Pilih </option>
                                    @foreach (App\Models\TapakPelupusanSampahs::KAEDAHPELUPUSAN as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </x-input.select>
                                <x-jet-input-error for="kaedah_pelupusan" class="mt-2" />
                            </div>

                        </div>

                        <livewire:tambah-pbt/>
                    </div>

                    <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        <x-button.button-link-secondary href="{{ route('setup.tapak_pelupusan_sampah.index' ) }}" svgClass="w-4 h-4 mr-2" type="backIcon" stroke="currentColor">
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
