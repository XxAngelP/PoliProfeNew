@php
    use Illuminate\Support\Facades\Cache;
    use App\Models\Academia;
    $academias = Cache::remember('academias', 60, function () {
    return Academia::all();
    });
@endphp
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="w-3/4 px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <div>
                        <a class="text-5xl font-black text-pink-900 duration-300 hover:text-pink-800" href="{{ route('welcome') }}">POLIPROFE</a>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center gap-10">

                @hasrole('moderador|administrador')
                    <a href="/panel">Dashboard</a>
                @endhasrole

                <details class="relative">
                <summary class="flex items-center gap-2 list-none transition duration-300 cursor-pointer hover:text-pink-950"><x-eva-arrow-ios-downward-outline class="w-5"/>Academia</summary>
                <div class="absolute bg-white">
                    @foreach ($academias as $academia)
                    <ul class="text-center">
                        <li class="p-2 min-w-32 hover:text-pink-900"><a href="/academia?id={{$academia->id}}">{{$academia->nombre}}</a></li>
                    </ul>
                    @endforeach
                </div>
                </details>

                <div class="flex items-center gap-2">        
                    <x-zondicon-search class="w-4 h-4"/>
                    <form action="/Maestros" method="GET">
                        <input type="text" placeholder="Maestro" id="busqueda-maestro" autocomplete="off" name="profesor" >
                        <ul id="sugerencias-maestro" class="absolute"></ul>
                        <script src="{{ asset('js/jquery.min.js') }}"></script> 
                        <script>
                            $(document).ready(function(){
                                $('#busqueda-maestro').on('input', function() {
                                    let query = $(this).val();
                                    if (query.length > 2) { // Evitar consultas con menos de 3 caracteres
                                        $.ajax({
                                            url: '/buscar-maestro',
                                            type: 'GET',
                                            data: { query: query },
                                            success: function(data) {
                                                let lista = $('#sugerencias-maestro');
                                                lista.empty();
                                                data.forEach(maestro => {
                                                    lista.append(`<li class="p-2 bg-white min-w-32 hover:text-pink-900"><a href='/profesor?id=${maestro.id}'>${maestro.nombre_completo}</a></li>`);
                                                });
                                            }
                                        });
                                    } else {
                                        $('#sugerencias-maestro').empty();
                                    }
                                });
                            });
                        </script>
                        <script>
                            document.getElementById("busqueda-maestro").addEventListener("keypress", function(event) {
                                if (event.key === "Enter") { // Detecta la tecla Enter
                                    event.preventDefault(); // Evita que el formulario se envíe
                                    let nombre = this.value.trim(); // Obtiene el valor del input
                                    if (nombre) {
                                        window.location.href = `/profesores?nombre=${nombre}`; // Redirige a la URL
                                    }
                                }
                            });
                        </script>
                    </form>
                </div>
                
                <div class="flex items-center gap-2">
                    <x-zondicon-search class="w-4 h-4"/>
                    <form action="" class="relative">
                        <input type="text" placeholder="Materia" id="busqueda-materia" autocomplete="off">
                        <ul id="sugerencias-materia" class="absolute"></ul>
                        <script>
                            $(document).ready(function(){
                                $('#busqueda-materia').on('input', function() {
                                    let query = $(this).val();
                                    if (query.length > 2) { // Evitar consultas con menos de 3 caracteres
                                        $.ajax({
                                            url: '/buscar-materia',
                                            type: 'GET',
                                            data: { query: query },
                                            success: function(data) {
                                                let lista = $('#sugerencias-materia');
                                                lista.empty();
                                                data.forEach(materia => {
                                                    lista.append(`<li class="p-2 bg-white min-w-32 hover:text-pink-900"><a href='/materia/${materia.id}'>${materia.nombre}</a></li>`);
                                                });
                                            }
                                        });
                                    } else {
                                        $('#sugerencias-materia').empty();
                                    }
                                });
                            });
                        </script>
                    </form>
    
                </div>
            </div>


            
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                    @guest
                    <div>    
                    @if (Route::has('login'))
                        <nav class="flex items-center justify-end gap-4">
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-block px-5 py-1.5 text-black border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                                >
                                    Inicia Sesion
                                </a>
    
                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="inline-block px-5 py-1.5 text-black border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                                        Registrate
                                    </a>
                            @endauth
                        </nav>
                    @endif
                    </div>
                @endguest
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
    @endauth
</nav>
