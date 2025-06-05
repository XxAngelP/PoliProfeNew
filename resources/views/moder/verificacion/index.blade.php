<x-app-layout>
    <div class="p-6 mb-10 bg-white rounded-lg shadow-md">
        <h2 class="mb-2 text-3xl font-bold text-pink-900">Solicitudes de verificacion</h2>
    </div>

    @foreach ($users as $user)
        @if ($user->is_auth != 1)
            <div class="flex items-center justify-between w-full p-5 mt-4 bg-white rounded-lg shadow-md">
                {{-- Informacion de usuario --}}
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-20 h-20 text-2xl font-bold text-white bg-pink-900 rounded-full">
                        @php
                            $pl = substr($user->name, 0, 1) . substr($user->first_last_name,0, 1);
                            echo $pl;
                        @endphp
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-pink-900">{{$user->name. ' ' . $user->first_last_name . ' '. $user->second_last_name}}</h3>
                        <h4 class="text-lg">{{$user->email}}</h4>
                    </div>
                </div>
                {{-- Opciones --}}
                <div class="flex items-center gap-3">
                    <a href="/verificacion/show?user={{$user->id}}" class="px-6 py-2 text-lg text-white bg-blue-900 rounded-lg hover:bg-blue-700">Ver solicitud</a>
                </div>
            </div>
        @endif
    @endforeach
</x-app-layout>