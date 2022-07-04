<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">    
    @livewireStyles
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans text-sm antialiased">

    <x-jet-banner />

    <div class="min-h-screen md:flex">

        <!-- mobile menu bar -->
        <div class="flex justify-between text-gray-100 bg-gray-500 md:hidden">
            <!-- logo -->
            <a href="#" class="block p-4 font-bold text-white">{{ config('app.name', 'SP2-v1') }}</a>

            <!-- mobile menu button -->
            <button class="p-4 mobile-menu-button focus:outline-none focus:bg-gray-700">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
        
        <div class="flex-1">

            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="flex flex-wrap justify-between bg-white shadow">
                    <div class="p-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                    <div class="items-center p-4 text-gray-400 text-start lg:px-8">
                        PBT: {{ Auth::user()->currentPbt->nama_pbt }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="text-sm">
                {{ $slot }}
            </main>

            
            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <livewire:delete-confirmation-modal>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @stack('modals')

    @livewireScripts
    <script src="https://unpkg.com/moment"></script>

    <script>

        window.addEventListener('closeDeleteModal', event => {
            $("#deleteConfirmationModal").modal('hide');
        })

    </script>

    @stack('scripts')
    @livewireChartsScripts
</body>

</html>