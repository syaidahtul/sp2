<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kontrak') }}
        </h2>
    </x-slot>

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- maklumat kontraktor -->
        <div class="m-4 border border-green-100 rounded-md shadow-sm bg-green-50 sm:m-0 md:m-4">
            <div class="grid gap-4 md:p-4 xs:grid-cols-1 md:grid-cols-6 bg-green-50">
                <div class="relative col-span-12 md:col-span-4 lg:col-span-4">
                    <input type="text" id="floating_outlined"
                        class="col-span-full lg:col-span-6 block px-2.5 pb-2.5 pt-4 font-semibold w-full text-sm text-gray-900 bg-green-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        value="{{ $kontraktor->nama }}"/>
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-green-50 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama
                        Kontraktor</label>
                </div>

                <div class="relative col-span-12 md:col-span-2 lg:col-span-2">
                    <input type="text" id="floating_outlined"
                        class="col-span-full lg:col-span-6 block px-2.5 pb-2.5 pt-4 font-semibold w-full text-sm text-gray-900 bg-green-50 rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        value="{{ $kontraktor->no_lesen }}"/>
                    <label for="floating_outlined"
                        class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-green-50 dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                        No Lesen
                    </label>
                </div>
            </div>
        </div>

        <!-- maklumat kontraktor -->
        <div class="flex justify-start w-full m-4 overflow-hidden rounded-md ">

        </div>

        <!-- maklumat kontraktor -->

    </div>
</x-app-layout>
