<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('PBT Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-11/12 mx-auto overflow-hidden sm:rounded-lg">

                <form action="{{ route('setup.pbt.store') }}" method="post">
                    @csrf

                    <div class="px-4 py-5 bg-white shadow sm:p-6">

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                <x-jet-label for="kod" value="{{ __('Kod') }}" />
                                <x-jet-input id="kod" class="block w-full mt-1 uppercase" type="text"
                                    name="kod" :value="old('kod')" autofocus autocomplete="off" />
                                <x-jet-input-error for="kod" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 md:col-span-4">
                                <x-jet-label for="namapbt" value="{{ __('Nama') }}" />
                                <x-jet-input id="nama_pbt" class="block w-full mt-1" type="text" name="nama_pbt"
                                    :value="old('nama_pbt')" autofocus autocomplete="off" />
                                <x-jet-input-error for="namapbt" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 md:col-span-1">
                                <x-jet-label for="status" value="{{ __('Status') }}" />
                                <select name="status" id="status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach (App\Models\Pbt::STATUSES as $value => $label)
                                        <option value="{{ $value }}" {{ ( old('status') === $value ) ? 'selected' : ''}}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                <x-jet-input-error for="status" class="mt-2" />
                            </div>

                        </div>
                        
                    </div>

                    <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                        <x-button.button-link-secondary href="{{ route('setup.pbt.index' ) }}" svgClass="w-4 h-4 mr-2" type="backIcon" stroke="currentColor">
                            <span class="self-center mx-4">{{__('Kembali') }} </span>
                        </x-button.button-link-secondary>

                        <x-jet-button>
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>