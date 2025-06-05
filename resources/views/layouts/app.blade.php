<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'PoliProfe') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            @if (session('mensaje'))
                @php
                    $type = session('type');
                @endphp

                @if ($type == "error")
                    <div class="w-3/4 p-2 mx-auto mt-3 text-lg text-center bg-red-600 rounded-lg shadow-md">
                        <h2 class="font-semibold text-white">{{session('mensaje')}}</h2>
                    </div>
                
                @elseif ($type == "success")
                    <div class="w-3/4 p-2 mx-auto mt-3 text-lg text-center bg-green-600 rounded-lg shadow-md">
                        <h2 class="font-semibold text-white">{{session('mensaje')}}</h2>
                    </div>
                
                @endif
            @endif

            <!-- Page Content -->
            <div class="flex justify-center mt-5">
                <div class="w-3/4 mx-auto">
                        {{ $slot }}
                </div>
            </div>
        </div>
        <footer class="mt-10 text-center text-gray-600">
        <p>© 2025 PoliProfe. Todos los derechos reservados.</p>
    </footer>
    </body>
</html>
