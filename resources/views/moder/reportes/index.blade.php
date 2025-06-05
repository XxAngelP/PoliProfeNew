<x-app-layout>
    <div class="p-6 mb-5 bg-white rounded-lg shadow-md">
        <h2 class="mb-2 text-3xl font-bold text-pink-900">Reportes de Comentarios</h2>
    </div>

    @foreach ($reportes_com as $reporte)
        <div class="w-full p-5 mb-3 bg-white rounded shadow-md">
            <h1 class="text-xl font-bold text-pink-900">Profesor: {{$reporte->comentario->profesor->nombre_completo}}</h1>
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
                    <form action="/reporte/comentario/keep" method="POST">
                    @csrf
                    @method('PUT')
                        <input type="hidden" name="reporte_com_id" value="{{$reporte->id}}">
                        <button class="p-3 text-white bg-blue-600 rounded">Mantener Comentario</button>
                    </form>
                    <form action="/reporte/comentario/disable" method="POST">
                    @csrf
                    @method('PUT')
                        <input type="hidden" name="reporte_com_id" value="{{$reporte->id}}">
                        <button class="p-3 text-white bg-red-600 rounded">Desactivar Comentario</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <div class="p-6 mb-5 bg-white rounded-lg shadow-md">
        <h2 class="mb-2 text-3xl font-bold text-pink-900">Reportes de Quejas</h2>
    </div>

    @foreach ($reportes_quj as $reporte)
        <div class="w-full p-5 mb-3 bg-white rounded shadow-md">
            <h1 class="text-xl font-bold text-pink-900">Profesor: {{$reporte->queja->profesor->nombre_completo}}</h1>
            <h2 class="text-xl text-pink-900">Comentario:</h2>
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
                    <form action="/reporte/queja/keep" method="POST">
                    @csrf
                    @method('PUT')
                        <input type="hidden" name="reporte_quj_id" value="{{$reporte->id}}">
                        <button class="p-3 text-white bg-blue-600 rounded">Mantener Queja</button>
                    </form>
                    <form action="/reporte/queja/disable" method="POST">
                    @csrf
                    @method('PUT')
                        <input type="hidden" name="reporte_quj_id" value="{{$reporte->id}}">
                        <button class="p-3 text-white bg-red-600 rounded">Desactivar Queja</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>
