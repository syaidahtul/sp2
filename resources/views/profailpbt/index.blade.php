<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profail PBT') }}
        </h2>
    </x-slot>
    
    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            
            <livewire:profail-pbt.tab-tapak-pelupusan-sampah :pbt='$pbt'>

            <x-jet-section-border />
            
        </div>
    </div>

</x-app-layout>
