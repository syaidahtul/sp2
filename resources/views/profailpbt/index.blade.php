<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profail PBT') }}
        </h2>
    </x-slot>

    <div class="py-6">
        
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            
            <div class="m-4 overflow-auto dark:border-gray-700 sm:rounded-lg">
                
                <div x-data="{ openTab: 1, 
                        activeClasses: 'bg-sky-100 border rounded-t-lg text-emerald-700 font-bold uppercase',
                        inactiveClasses: 'hover:text-emerald-800' }" 
                    class="flex flex-wrap border-gray-200 ">
                    
                    <ul class="flex items-center w-full border rounded-t-lg bg-gray-50 sm:justify-items-start">
                        
                        <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }" class="px-3 py-3 mr-1 -mb-px">
                            <a :class="openTab === 1 ? activeClasses : inactiveClasses" href="#"
                                aria-current="page" class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
                                Profail
                            </a>
                        </li>
                        <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }" class="px-3 py-3 mr-1">
                            <a  href="#" :class="openTab === 2 ? activeClasses : inactiveClasses"
                                class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
                                Lokasi
                            </a>
                        </li>
                        <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }" class="px-3 py-3 mr-1">
                            <a :class="openTab === 3 ? activeClasses : inactiveClasses"
                                href="#"
                                class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
                                Tapak Pelupusan Sampah
                            </a>
                        </li>
                        <li @click="openTab = 4" :class="{ '-mb-px': openTab === 4 }" class="px-3 py-3 mr-1">
                            <a :class="openTab === 4 ? activeClasses : inactiveClasses"
                                href="#"
                                class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
                                Jentera
                            </a>
                        </li>
                        <li @click="openTab = 5" :class="{ '-mb-px': openTab === 5 }" class="px-3 py-3 mr-1">
                            <a :class="openTab === 5 ? activeClasses : inactiveClasses"
                                href="#"
                                class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
                                Kontraktor
                            </a>
                        </li>
                        <li @click="openTab = 'pengguna'" :class="{ '-mb-px': openTab === 'pengguna' }" class="px-3 py-3 mr-1">
                            <a :class="openTab === 'pengguna' ? activeClasses : inactiveClasses"
                                href="#"
                                class="inline-block px-4 py-3 rounded-lg active hover:font-bold focus:font-bold">
                                Pengguna
                            </a>
                        </li>
                    </ul>
                    
                    <div class="w-full p-4 border border-black rounded-lg rounded-t-none">
                        
                        <div x-show="openTab === 1">
                            <livewire:profail-pbt.tab-profail :pbt="$pbt"/>
                        </div>

                        <div x-show="openTab === 2">
                            <livewire:profail-pbt.tab-lokasi :pbt="$pbt"/>
                        </div>
                        
                        <div x-show="openTab === 3">
                            <livewire:profail-pbt.tab-tapak-pelupusan-sampah :pbt="$pbt"/>
                        </div>
                        
                        <div x-show="openTab === 4">
                            <livewire:profail-pbt.tab-jentera :pbt="$pbt"/>
                        </div>

                        <div x-show="openTab === 5">
                            <livewire:profail-pbt.tab-kontraktor :pbt="$pbt"/>
                        </div>

                        <div x-show="openTab === 'pengguna'">

                            <x-table class="mb-4 sm:rounded-sm">
                                
                                <x-slot name="head">
                                    <x-table.heading sortable> Nama </x-table.heading>
                                    <x-table.heading sortable> Email </x-table.heading>
                                    <x-table.heading sortable> No Telefon  </x-table.heading>
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
            
        </div>

</x-app-layout>
