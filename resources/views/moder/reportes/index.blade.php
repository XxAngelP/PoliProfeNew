<x-app-layout>
    <div class="p-6 mb-5 bg-white rounded-lg shadow-md">
        <h2 class="mb-2 text-3xl font-bold text-pink-900">Reportes de Comentarios</h2>
    </div>

    @foreach ($reportes_com as $reporte)
        <div class="w-full p-5 mb-3 bg-white rounded shadow-md">
            <h1 class="text-xl text-pink-900">Comentario:</h1>
            <div class="p-5 rounded shadow-md">
                <h1 class="text-lg text-pink-900">{{$reporte->comentario->materia->nombre}}</h1>
                <p class="text-md">{{$reporte->comentario->r_com}}</p>
            </div>
            <div class="flex items-end justify-between">
                {{-- Reporte --}}
                <div>
                    <h1 class="mt-2 text-xl text-pink-900">Reporte:</h1>
                    <div class="p-5 rounded shadow-md bg-yellow-50">
                        <p class="text-md">{{$reporte->txt_reporte}}</p>
                    </div>
                </div>
                {{-- Opciones --}}
                <div class="flex gap-6">
                    <a class="p-3 text-white bg-blue-600 rounded" href="">Mantener Comentario</a>
                    <a class="p-3 text-white bg-red-600 rounded" href="">Desactivar Comentario</a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="p-6 mb-5 bg-white rounded-lg shadow-md">
        <h2 class="mb-2 text-3xl font-bold text-pink-900">Reportes de Quejas</h2>
    </div>

    @foreach ($reportes_quj as $reporte)
        <div class="w-full p-5 mb-3 bg-white rounded shadow-md">
            <h1 class="text-xl text-pink-900">Comentario:</h1>
            <div class="p-5 rounded shadow-md">
                <h1 class="text-lg text-pink-900">{{$reporte->queja->categoria->nombre}}</h1>
                <p class="text-md">{{$reporte->queja->comentario}}</p>
            </div>
            <div class="flex items-end justify-between">
                {{-- Reporte --}}
                <div>
                    <h1 class="mt-2 text-xl text-pink-900">Reporte:</h1>
                    <div class="p-5 rounded shadow-md bg-yellow-50">
                        <p class="text-md">{{$reporte->txt_reporte}}</p>
                    </div>
                </div>
                {{-- Opciones --}}
                <div class="flex gap-6">
                    <a class="p-3 text-white bg-blue-600 rounded" href="">Mantener Comentario</a>
                    <a class="p-3 text-white bg-red-600 rounded" href="">Desactivar Comentario</a>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
