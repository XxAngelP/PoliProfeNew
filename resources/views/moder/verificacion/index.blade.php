<x-app-layout>
    <div class="bg-white rounded-lg shadow-md p-6 mb-10">
        <h2 class="text-3xl font-bold mb-2 text-pink-900">Solicitudes de verificacion</h2>
    </div>

    @foreach ($users as $user)
        <div class="bg-white rounded-lg shadow-md p-5 mt-4 w-full items-center flex justify-between">
            {{-- Informacion de usuario --}}
            <div class="flex gap-3 items-center">
                <div class="w-20 h-20 rounded-full bg-pink-900 flex items-center justify-center text-white text-2xl font-bold">
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
            <div class="flex gap-3 items-center">
                <a href="/verificacion/show?user={{$user->id}}" class="bg-blue-900 text-white py-2 px-6 rounded-lg hover:bg-blue-700 text-lg">Ver solicitud</a>
            </div>
        </div>
    @endforeach
</x-app-layout>