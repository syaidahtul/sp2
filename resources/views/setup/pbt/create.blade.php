<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('PBT Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-11/12 mx-auto overflow-hidden sm:rounded-lg">

                <form action="{{ route('setup.pbt.store') }}" method="post">
                    @csrf
                    <div class="mt-4 -mb-3">
                        <div class="relative overflow-hidden not-prose bg-slate-50 rounded-xl dark:bg-slate-800/25">
                            <div style="background-position:10px 10px" class="absolute">
                            </div>

                            <div class="relative p-8 overflow-auto rounded-xl">
                                <div class="grid grid-cols-6 gap-4 font-mono text-sm font-bold leading-6 rounded-lg bg-stripes-violet">
                                    <div class="col-span-2 p-4 rounded-lg shadow-lg bg-emerald-500">
                                        <x-jet-label for="request" value="{{ __('Kod PBT') }}" />
                                        <x-jet-input id="kod_pbt" class="block w-full mt-1 uppercase" type="text"
                                            name="kod_pbt" :value="old('kod_pbt')" autofocus autocomplete="off" />
                                    </div>
                                    <div class="col-span-4 col-start-3 p-4 rounded-lg shadow-lg bg-emerald-500">
                                        <x-jet-label for="nama_pbt" value="{{ __('Nama PBT') }}" />
                                        <x-jet-input id="nama_pbt" class="block w-full mt-1" type="text" name="nama_pbt"
                                            :value="old('nama_pbt')" autofocus autocomplete="off" />
                                    </div>
                                </div>
                            </div>

                            <div
                                class="absolute inset-0 border pointer-events-none border-black/5 rounded-xl dark:border-white/5">
                            </div>
                        </div>

                        <div class="flex items-center justify-end p-4 m-4">
                            <a href="{{ route('setup.pbt.index') }}"
                                class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-500 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'>
                                {{ __('Kembali') }}
                            </a>
                            <x-jet-button class="ml-4">
                                {{ __('Simpan') }}
                            </x-jet-button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>