<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <div class="flex flex-col items-center min-h-screen font-sans antialiased text-gray-900 bg-gray-100">

        {{-- <nav class="w-full bg-gray-800">
            <div class="px-2 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-20">
                    <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                        <div class="flex items-center flex-shrink-0">
                            <img class="w-auto h-12" src="{{ asset('images/logo.svg') }}" alt="SP2S-v1.0.0">
                            <h1 class="hidden font-bold text-white lg:px-5 lg:block">{{ __('SISTEM PENGURUSAN SISA PEPEJAL')}}</h1>
                        </div>
                    </div>

                    <div class="flex items-end justify-end flex-2">
                        <img class="hidden w-auto h-16 lg:block" src="{{ asset('images/logo_smj.png') }}" alt="SP2S-v1.0.0">
                    </div>
                </div>
            </div>
        </nav> --}}

        <main class="flex items-center justify-center flex-grow w-full bg-teal-400">
            {{ $slot }}
        </main>

        <footer class="w-full bg-gray-800">
            <div class="flex items-center justify-center flex-shrink-0">
                <h1 class="hidden text-xs font-bold text-white lg:px-5 lg:block">&copy; {{ __(' 2022 Jabatan Perkhidmatan Komputer Negeri Sabah')}}</h1>
            </div>
        </footer>
    </div>
</body>

</html>