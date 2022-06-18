<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo class="w-16 mx-auto mt-4"/>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Lupa kata laluan? Sila masukkan alamat email yang didaftarkan untuk penetapan semula kata laluan.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            
            <div class="flex items-center justify-end gap-6 mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Log Masuk') }}
                </a>
                
                <x-jet-button class="capitalize">
                    {{ __('Hantar email penetapan kata laluan') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
