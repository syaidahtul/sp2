<div>
    <x-table class="">
                                
        <x-slot name="head">
            <x-table.heading sortable> Nama </x-table.heading>
            <x-table.heading sortable> Catatan </x-table.heading>
            <x-table.heading sortable> Tarikh Mula  </x-table.heading>
            <x-table.heading sortable> Tarikh Tamat  </x-table.heading>
            <x-table.heading> </x-table.heading>
        </x-slot>

        <x-slot name="body">
            @forelse ($kontraktors as $kontraktor)
                <x-table.row>
                    <x-table.cell> 
                        {{ $kontraktor->nama }}
                    </x-table.cell>
                    <x-table.cell> 
                        {{ $kontraktor->catatan }} 
                    </x-table.cell>
                    <x-table.cell> 
                        {{ $kontraktor->tarikh_mula }} 
                    </x-table.cell>
                    <x-table.cell> 
                        {{ $kontraktor->tarikh_tamat }} 
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
