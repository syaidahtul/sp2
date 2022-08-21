<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white border border-gray-100 shadow-sm rounded-md sm:rounded-lg">


                <div class="p-4 bg-white border rounded shadow" style="height: 32rem;">
                    <livewire:livewire-radar-chart
                        key="{{ $radarChartModel->reactiveKey() }}"
                        :radar-chart-model="$radarChartModel"
                    />
                </div>

                <div class="p-4 bg-white border rounded shadow" style="height: 32rem;">
                    <livewire:livewire-tree-map-chart
                        key="{{ $treeChartModel->reactiveKey() }}"
                        :tree-map-chart-model="$treeChartModel"
                    />
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
