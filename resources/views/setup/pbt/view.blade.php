<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Papar PBT') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-11/12 mx-auto overflow-hidden sm:rounded-lg">

                <div class="mt-4 -mb-3">
                    <div class="relative overflow-hidden not-prose bg-slate-50 rounded-xl dark:bg-slate-800/25">
                        <div style="background-position:10px 10px"
                            class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))]
                                dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]">
                        </div>

                        <div class="relative p-8 overflow-auto rounded-xl">
                            <div
                                class="grid grid-cols-6 gap-4 font-mono text-sm font-bold leading-6 rounded-lg bg-stripes-violet">
                                <div class="col-span-2 p-4 rounded-lg shadow-lg bg-emerald-400">
                                    <x-jet-label for="request" value="{{ __('Kod PBT') }}" />
                                    <x-jet-input id="kod" class="block w-full mt-1 uppercase bg-gray-400" type="text"
                                        name="kod" :value="$pbt->kod" autofocus autocomplete="off" disabled/>
                                </div>
                                <div class="col-span-4 col-start-3 p-4 rounded-lg shadow-lg bg-emerald-400">
                                    <x-jet-label for="nama_pbt" value="{{ __('Nama PBT') }}" />
                                    <x-jet-input id="nama_pbt" class="block w-full mt-1 bg-gray-400" type="text" name="nama_pbt"
                                        :value="$pbt->nama_pbt" autofocus autocomplete="off" disabled/>
                                </div>
                            </div>
                        </div>
                        <div
                            class="absolute inset-0 border pointer-events-none border-black/5 rounded-xl dark:border-white/5">
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-2 p-4 m-4">
                        <x-button.button-link-secondary href="{{ route('setup.pbt.index' ) }}" svgClass="w-4 h-4 mr-2" type="backIcon" stroke="currentColor">
                            <span class="self-center mx-4">{{__('Kembali') }} </span>
                        </x-button.button-link-secondary>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>