<div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="flex justify-between md:col-span-1">
        <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium text-gray-900">Senarai Pengguna</h3>
            <p class="mt-1 text-sm text-gray-600"></p>
        </div>

        <div class="px-4 sm:px-0">
        </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
        
        <div class="grid grid-cols-6 gap-6">
            <div class="min-w-full col-span-6 overflow-hidden overflow-x-auto shadow sm:rounded-sm">

                <x-table class="sm:rounded-sm">

                    <x-slot name="head">
                        <x-table.heading sortable> Nama </x-table.heading>
                        <x-table.heading sortable> Email </x-table.heading>
                        <x-table.heading sortable> No Telefon Pejabat </x-table.heading>
                        <x-table.heading> </x-table.heading>
                    </x-slot>
        
                    <x-slot name="body">
                        @forelse ($pbt->users as $user)
                            <x-table.row>
                                <x-table.cell>
                                    {{ $user->name }}
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $user->email }}
                                </x-table.cell>
                                <x-table.cell>
                                    {{ $user->office_no }}
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
        </div>
        
    </div>
</div>
