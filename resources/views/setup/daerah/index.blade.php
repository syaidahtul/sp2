[<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Senarai Daerah') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <a href="{{ route('setup.daerah.create') }}" class='inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-gray-500 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'>{{ __('PTB Baru') }}</a>
                    <table class="min-w-full divide-y divide-gray-200 hover:table-fixed">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama Lokasi') }}</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Nama DAERAH') }}</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">{{ __('Jenis Operasi') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($daerahs as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap"> {{ $item->kod_daerah }} </td>
                                    <td class="px-6 py-4 whitespace-nowrap"> {{ $item->nama_daerah }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{ $daerahs->links() }}

            </div>
        </div>
    </div>

</x-app-layout> 
