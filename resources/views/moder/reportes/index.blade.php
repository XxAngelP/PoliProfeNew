<x-app-layout>
    <div class="bg-white rounded-lg shadow-md p-6 mb-10">
        <h2 class="text-3xl font-bold mb-2 text-pink-900">Reportes de Comentarios</h2>
    </div>

    @foreach ($reportes_com as $reporte)
        <div class="bg-white rounded w-full mb-2 p-5 shadow-md">
            <h1 class="text-pink-900 text-xl">Comentario:</h1>
            <div class="shadow-md rounded p-5">
                <h1 class="text-pink-900 text-lg">{{$reporte->comentario->materia->nombre}}</h1>
                <p class="text-md">{{$reporte->comentario->r_com}}</p>
            </div>
            <div class="flex justify-between items-end">
                {{-- Reporte --}}
                <div>
                    <h1 class="mt-2 text-pink-900 text-xl">Reporte:</h1>
                    <p class="text-md">{{$reporte->txt_reporte}}</p>
                </div>
                {{-- Opciones --}}
                <div class="">
                    <a class="p-3 bg-blue-600 text-white rounded" href="">Ver reporte</a>
                    <a class="p-3 bg-red-600 text-white rounded" href="">Eliminar Reporte</a>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
