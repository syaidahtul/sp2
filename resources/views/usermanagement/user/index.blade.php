<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Senarai Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white border shadow-xl sm:rounded-lg">

                <div class="mt-5 md:mt-0 md:col-span-2">

                    <form wire:submit.prevent="submit">

                        <div
                            class="flex items-center justify-start px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900 uppercase">
                                    {{ __('Kriteria Carian Pengguna') }}</h3>
                            </div>
                        </div>

                        <div class="px-4 py-5 bg-white shadow sm:p-6">

                            <div class="grid grid-cols-6 gap-6">

                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="name" value="{{ __('Nama') }}" />
                                    <x-jet-input id="name" type="text" class="block w-full mt-1"
                                        autocomplete="off" name="name" value="{{ request()->get('name') }}" />
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                    <x-jet-label for="identity_no" value="{{ __('No Kad Pengenalan') }}" />
                                    <x-jet-input id="identity_no" type="text" class="block w-full mt-1"
                                        autocomplete="off" name="identity_no"
                                        value="{{ request()->get('identity_no') }}" />
                                    <x-jet-input-error for="identity_no" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="pbt" value="{{ __('Nama PBT') }}" />
                                    <select name="pbt" id="pbt"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                                        <option value="">{{ __('Sila Pilih') }}</option>
                                         @foreach ($pbts as $item)
                                        <option value="{{ $item->kod }}"
                                            {{ request()->get('pbt') === $item->kod ? 'selected' : '' }}>
                                            {{ $item->nama_pbt }} ({{ $item->kod }})</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="pbt" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                    <x-jet-label for="role" value="{{ __('Peranan') }}" />
                                    <select name="role" id="role"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                                        <option value="">{{ __('Sila Pilih') }}</option>
                                         @foreach ($roles as $item)
                                        <option value="{{ $item->id }}" {{ request()->get('role') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="role" class="mt-2" />
                                </div>

                            </div>
                        </div>

                        <div
                            class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                            <x-button.button-link class="px-4 py-2" href="{{ route('usermgmt.user.create' ) }}" type="createIcon" svgClass="w-4 h-4"><span class="self-center mx-2">{{__('Pengguna Baru') }} </span> </x-button.button-link>
                            <x-jet-button>
                                <x-icons.search stroke="currentColor" class="w-4 h-4"></x-icons.search><span class="self-center mx-2">{{__('Cari') }} </span> 
                            </x-jet-button>
                        </div>

                    </form>

                </div>
            </div>

        </div>

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-auto bg-white shadow-xl sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 hover:table-fixed">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase">
                                {{ __('No.') }}</th>
                            <th scope="col"
                                class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase">
                                {{ __('Nama') }}</th>
                            <th scope="col"
                                class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase">
                                {{ __('Email') }}</th>
                            <th scope="col"
                                class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase">
                                {{ __('KKTP/PBT') }}</th>
                            <th scope="col"
                                class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase">
                                {{ __('Peranan') }}</th>
                            <th scope="col"
                                class="px-6 py-3 font-medium tracking-wider text-center text-gray-600 uppercase">
                                {{ __('Tindakan') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $loop->iteration }} </td>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $item->name }} </td>
                                <td class="px-6 py-4"> {{ $item->email }} </td>
                                <td class="px-6 py-4">
                                    {{ $item->currentPbt->nama_pbt }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->getRoleNames()->first() }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    <x-button.button-link type="editIcon" href="{{ route('usermgmt.user.edit', $item ) }}"><x-icons.pencil class="w-4 h-4" stroke="blue"></x-icons.pencil> </x-button.button-link>
                                    <x-button.button-link type="deleteIcon" href="#" data-modal-target="#deleteConfirmationModal" data-modal-toggle="deleteConfirmationModal" onclick="window.livewire.emit('delete-confirmation-modal', '\\\App\\\Models\\\User', 'id', '{{ $item->id }}', '', '{{ $item->name }}' )"> 
                                        <x-icons.trash class="w-4 h-4" stroke="red"></x-icons.trash>
                                    </x-button.button-link>
                                </td>
                            </tr>
                        @empty
                            <x-empty-table colspan="6"></x-empty-table>
                        @endforelse
                    </tbody>
                </table>
                {{ $users->links() }}

            </div>
        </div>
    </div>

</x-app-layout>
