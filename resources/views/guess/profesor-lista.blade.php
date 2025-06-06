<x-app-layout>
    <div class="p-2 bg-white rounded-lg shadow-md">
        <h2 class="mb-2 text-3xl font-bold text-center text-pink-900">{{$mensaje}}</h2>
    </div>

    <div class="grid grid-cols-3 gap-4">
        <x-profesores-list :profesores="$profesores"></x-profesores-list>
    </div>
</x-app-layout>