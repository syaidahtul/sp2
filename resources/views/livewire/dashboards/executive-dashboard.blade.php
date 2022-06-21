<div class="py-6">
    <div class="py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            
        <div class="mt-5 md:mt-0 md:col-span-2">
                
                {{--
            <div class="px-4 py-5 bg-white sm:p-6">
                 <div class="grid grid-cols-6 gap-6">
                    
                    <x-jet-input type="text" placeholder="Tapis carian" wire:model='search'></x-jet-input>
                                                
                </div>
                
            </div> --}}
                
            <!-- senarai pbt -->
            <div class="px-4 py-5 bg-white sm:p-6">
                
                <x-table class="">
                    <x-slot name="head">
                        <x-table.heading sortable> Kod PBT </x-table.heading>
                        <x-table.heading sortable> Nama </x-table.heading>
                        <x-table.heading sortable> Status  </x-table.heading>
                    </x-slot>
                    
                    <x-slot name="body">

                        @forelse ($pbts as $pbt)
                            <x-table.row>
                                <x-table.cell> 
                                    {{ $pbt->kod }}
                                </x-table.cell>
                                <x-table.cell> 
                                    <a href="{{ route('profailpbt.index') }}" class="text-decoration-none">{{ $pbt->nama_pbt }}</a> 
                                </x-table.cell>
                                <x-table.cell> 
                                    <span style = "background-color: {{ $pbt->active_color }}"
                                        class="inline-flex items-center px-2.5 py-1.5 rounded-full text-sm font-medium leading-4 capitalize">
                                        {{ $pbt->active_desc }} 
                                    </span>
                                </x-table.cell>
                            </x-table.row>
                        @empty
                            <x-table.row>
                                <x-table.cell colspan=2 > 
                                    {{ __('Tiada rekod.') }}
                                </x-table.cell>
                            </x-table.row>
                        @endforelse
                        
                    </x-slot>
                    
                </x-table>
                
                <div class="container p-4 mx-auto mt-8 space-y-4 sm:p-0">
                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                        <div class="flex-1 p-4 bg-white border rounded shadow" style="height: 32rem;">
                            <livewire:livewire-column-chart
                                key="{{ $columnChartModel->reactiveKey() }}"
                                :column-chart-model="$columnChartModel"
                            />
                        </div>
            
                        <div class="flex-1 p-4 bg-white border rounded shadow" style="height: 32rem;">
                            <livewire:livewire-pie-chart
                                key="{{ $pieChartModel->reactiveKey() }}"
                                :pie-chart-model="$pieChartModel"
                            />
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</div>