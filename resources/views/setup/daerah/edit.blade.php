<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daerah Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-11/12 mx-auto overflow-hidden sm:rounded-lg">

                <form action="{{ route('setup.daerah.update', $daerah) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="px-4 py-5 bg-white shadow sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                <x-jet-label for="kod" value="{{ __('Kod') }}" />
                                <x-jet-input id="kod" class="block w-full mt-1 font-semibold uppercase bg-gray-200" type="text"
                                    name="kod" :value="$daerah->kod" autofocus autocomplete="off" readonly />
                                <x-jet-input-error for="kod" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 md:col-span-4">
                                <x-jet-label for="nama" value="{{ __('Nama') }}" />
                                <x-jet-input id="nama" class="block w-full mt-1" type="text" name="nama"
                                    :value="$daerah->nama" autofocus autocomplete="off" />
                                <x-jet-input-error for="nama" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                <x-jet-label for="status" value="{{ __('Status') }}" />
                                <x-input.select name="status" id="status" >
                                    <option value="1" {{ request()->get('aktif') == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ request()->get('aktif') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                </x-input.select>
                                <x-jet-input-error for="status" class="mt-2" />
                            </div>

                        </div>

                    </div>

                    <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        <x-button.button-link-secondary href="{{ route('setup.daerah.index' ) }}" svgClass="w-4 h-4 mr-2" type="backIcon" stroke="currentColor">
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
