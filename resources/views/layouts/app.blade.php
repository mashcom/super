<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset("fonts/inter.css")}}">
    <link href="{{asset('css/apexcharts.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    
    <style>
        body {
            font-family: "Inter", Figtree, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased dark">
    <x-banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">

        @livewire('navigation-menu')

        <div class="flex flex-row">
            <div class="lg:basis-56 md:basis-0">
                @livewire('sidebar')
            </div>
            <!-- Page Content -->
            <main class="flex-1 p-4">
                @if (isset($header))
                    <header class="bg-whites shadows">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                {{ $slot }}
            </main>

        </div>

    </div>

    @stack('modals')

    @livewireScripts
    <footer
        class="bg-white rounded-lg shadow sm:flex sm:items-center sm:justify-between p-4 dark:bg-gray-800 antialiased">
        <p class="text-sm text-center text-gray-500 dark:text-gray-400 sm:mb-0">
         
        </p>
        <div class="flex justify-center items-center space-x-1">

            <p class="text-sm text-center text-gray-500 dark:text-gray-400 sm:mb-0">
            @if (auth()->user()->is_admin == 1)
                Logged as Admin
            @elseif(auth()->user()->student_id == null && auth()->user()->is_admin != 1)
                Logged in as General User
            @elseif(auth()->user()->student_id > 0)
                Logged in as Student
            @endif
            </p>
        </div>
    </footer>
    <script src="{{asset('js/flowbite.min.js')}}"></script>
    <script src="{{asset('js/apexcharts.min.js')}}"></script>
    <script src="{{asset('js/charts.js')}}"></script>

</body>

</html>