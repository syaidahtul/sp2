<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Lokasi Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-11/12 mx-auto overflow-hidden sm:rounded-lg">

                <form action="{{ route('profailpbt.lokasi.store') }}" method="post" class="border rounded-sm shadow-neutral-200">
                    @csrf

                    <div class="flex items-center justify-center mt-6">

                    </div>


                    <div class="flex items-center justify-end m-4">
                        <x-jet-button class="ml-4">
                            {{ __('Simpan') }}
                        </x-jet-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>