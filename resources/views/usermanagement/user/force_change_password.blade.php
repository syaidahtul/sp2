<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Tukar Kata Laluan') }}
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">

                <div class="px-4 py-6">
                    
                    <form method="POST" action="{{ route('user.updateforceChangePassword') }}">
                        @csrf
                        
                        <div class="block">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block w-full mt-1 bg-gray-100" type="email" name="email" :value="$user->email" disabled autofocus />
                        </div>
                        
                        <div class="mt-4">
                            <x-jet-label for="identity_no" value="{{ __('Identity No') }}" />
                            <x-jet-input id="identity_no" class="block w-full mt-1 bg-gray-100" type="text" name="identity_no" :value="$user->identity_no" disabled autofocus />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" autocomplete="new-password" />
                            <x-jet-input-error for="password" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" autocomplete="new-password" />
                            <x-jet-input-error for="password_confirmation" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button>
                                {{ __('Reset Password') }}
                            </x-jet-button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
