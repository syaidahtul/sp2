<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kemaskini Tapak Pelupusan Sampah') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <form action="{{ route('setup.tapak_pelupusan_sampah.update', $tapak) }}" method="post">
                @method('PUT')
                @csrf
                <!-- maklumat tapak pelupusan sampah -->
                <div class="px-4 py-5 bg-white shadow sm:p-6">

                    <div class="grid gap-4 md:p-4 xs:grid-cols-1 md:grid-cols-6 bg-green-50">
                        <div class="relative col-span-12 md:col-span-4 lg:col-span-4">
                            <input type="text" id="tempat" disabled
                                class="col-span-full lg:col-span-6 block px-2.5 pb-2.5 pt-4 font-semibold w-full text-sm text-gray-900 bg-green-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ $tapak->tempat }}" />
                            <label for="floating_outlined"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0]
                                bg-green-50 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                                peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama
                                Tempat</label>
                        </div>

                        <div class="relative col-span-12 md:col-span-2 lg:col-span-2">
                            <input type="text" id="kaedah_pelupusan" disabled
                                class="col-span-full lg:col-span-6 block px-2.5 pb-2.5 pt-4 font-semibold w-full text-sm text-gray-900 bg-green-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ $tapak->kaedah_pelupusan_label }}" />
                            <label for="floating_outlined"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-green-50 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                                Kaedah Pelupusan
                            </label>
                        </div>
                    </div>

                    <livewire:tambah-pbt modelName="PbtTapakPelupusanSampahs" :modelId="$tapak" />

                </div>

                <div
                    class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    <x-button.button-link-secondary href="{{ route('setup.tapak_pelupusan_sampah.index') }}"
                        svgClass="w-4 h-4 mr-2" type="backIcon" stroke="currentColor">
                        <span class="self-center mx-4">{{ __('Kembali') }} </span>
                    </x-button.button-link-secondary>

                    <x-jet-button>
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
