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
                        
                        <div class="flex items-center justify-start px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium text-gray-900 uppercase">{{ __('Kriteria Carian Pengguna') }}</h3>
                            </div>
                        </div>
                        
                        <div class="px-4 py-5 bg-white shadow sm:p-6">
                            
                            <div class="grid grid-cols-6 gap-6">
                
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="name" value="{{ __('Nama') }}" />
                                    <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="name" autocomplete="off" name="name" value="{{ old('name') }}"/>
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>
                        
                                <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                    <x-jet-label for="identity_no" value="{{ __('No Kad Pengenalan') }}" />
                                    <x-jet-input id="identity_no" type="text" class="block w-full mt-1" wire:model.defer="identity_no" autocomplete="off" name="identity_no" value="{{ old('identity_no') }}"/>
                                    <x-jet-input-error for="identity_no" class="mt-2" />
                                </div>
                        
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="pbt" value="{{ __('Nama PBT') }}" />                                    
                                    <select name="pbt" id="pbt"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm ring-1 ring-black ring-opacity-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                                        <option value="">{{ __('Sila Pilih') }}</option>
                                        @foreach ($pbts as $item)
                                            <option value="{{ $item->kod }}" {{ ( request()->get('pbt') === $item->kod) ? 'selected' : '' }}>{{ $item->nama_pbt }}  ({{ $item->kod }})</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="pbt" class="mt-2" />
                                </div>
                        
                                <div class="col-span-6 sm:col-span-4 md:col-span-2">
                                    <x-jet-label for="role" value="{{ __('Peranan') }}" />
                                    <select wire:model.defer="role" name="role" id="role" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm ring-1 ring-black ring-opacity-5 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" ">
                                        <option value="">{{ __('Sila Pilih') }}</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}" {{ ( request()->get('role') == $item->id ) ? 'selected' : '' }}> {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="role" class="mt-2" />
                                </div>
                                
                            </div>
                        </div>
                
                        <div class="flex items-center justify-end gap-4 px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                            <x-button.button-link href="{{ route('usermgmt.user.create') }}">
                                {{ __('Pengguna Baru') }}
                            </x-button.button-link>
                            
                            <x-jet-button>
                                {{ __('Cari') }}
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
                            <th scope="col" class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase"> {{ __('No.') }}</th>
                            <th scope="col" class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase"> {{ __('Nama') }}</th>
                            <th scope="col" class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase"> {{ __('Email') }}</th>
                            <th scope="col" class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase"> {{ __('KKTP/PBT') }}</th>
                            <th scope="col" class="px-6 py-3 font-medium tracking-wider text-left text-gray-600 uppercase"> {{ __('Peranan') }}</th>
                            <th scope="col" class="px-6 py-3 font-medium tracking-wider text-center text-gray-600 uppercase"> {{ __('Tindakan') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $loop->iteration }} </td>
                                <td class="px-6 py-4 whitespace-nowrap"> {{ $item->name }} </td>
                                <td class="px-6 py-4"> {{ $item->email }} </td>
                                <td class="px-6 py-4">
                                    {{ $item->currentOffice->nama_pbt }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $item->getRoleNames()->first() }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{-- <a href="{{ route('usermgmt.user.view', $item) }}"
                                        class="inline-flex items-center px-4 py-2 font-semibold tracking-widest text-gray-600 uppercase transition border border-transparent rounded-md bg-emerald-300 hover:bg-green-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd"
                                                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a> --}}
                                    <a href="{{ route('usermgmt.user.edit', $item) }}"
                                        class="inline-flex items-center px-4 py-2 font-semibold tracking-widest text-gray-600 uppercase transition bg-yellow-300 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </a>
                                    <form class="inline-flex "
                                        action="{{ route('usermgmt.user.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 font-semibold tracking-widest text-gray-600 uppercase transition bg-red-300 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25'">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </form>
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
