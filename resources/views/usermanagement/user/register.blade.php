<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Pengguna Baru') }}
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="px-4 py-6">

                    <form method="POST" action="{{ route('usermgmt.user.store') }}">
                        @csrf

                        <x-jet-form-section submit="updateProfileInformation">
                            <x-slot name="title">
                                {{ __('Profile Information') }}
                            </x-slot>

                            <x-slot name="description">

                            </x-slot>

                            <x-slot name="form">

                                <!-- Name -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                    <input
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        id="name" type="text" name="name" value={{ old('name') }}>
                                    <x-jet-input-error for="name" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="email" value="{{ __('Email') }}" />
                                    <input
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        id="email" type="email" name="email" value={{ old('email') }}>
                                    <x-jet-input-error for="email" class="mt-2" />
                                </div>

                                <!-- Identity No -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="identity_no" value="{{ __('Identity No') }}" />
                                    <input
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        id="identity_no" type="text" name="identity_no"
                                        value={{ old('identity_no') }}>
                                    <x-jet-input-error for="identity_no" class="mt-2" />
                                </div>

                                <!-- Current PBT -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="current_pbt" value="{{ __('Kementerian/PBT') }}" />
                                    <select name="current_pbt" id="current_pbt"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <option value="">{{ __('Sila Pilih') }}</option>
                                        @foreach ($pbts as $item)
                                            <option value="{{ $item->kod }}"
                                                {{ old('current_pbt') == $item->kod ? 'selected' : '' }}>
                                                {{ $item->nama_pbt }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="current_pbt" class="mt-2" />
                                </div>

                                <!-- Roles -->
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="role" value="{{ __('Peranan') }}" />
                                    <select name="role" id="role"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">{{ __('Sila Pilih') }}</option>
                                @foreach ($roles as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('role') == $item->id ? 'selected' : '' }}> {{ $item->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="role" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="password" value="{{ __('New Password') }}" />
                                    <x-jet-input id="password" type="password" class="block w-full mt-1"
                                        name="password" autocomplete="new-password" />
                                    <x-jet-input-error for="password" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                    <x-jet-input id="password_confirmation" type="password" class="block w-full mt-1"
                                        name="password_confirmation" autocomplete="new-password" />
                                    <x-jet-input-error for="password_confirmation" class="mt-2" />
                                </div>

                            </x-slot>

                            <x-slot name="actions">
                                <div class="gap-6">
                                    <x-button.button-link-secondary href="{{ route('usermgmt.user.index') }}">
                                        {{ __('Back') }}
                                    </x-button.button-link-secondary>

                                    <x-jet-button>
                                        {{ __('Register') }}
                                    </x-jet-button>
                                </div>
                            </x-slot>

                        </x-jet-form-section>


                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
