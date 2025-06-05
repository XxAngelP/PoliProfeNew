<x-app-layout>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-1 text-2xl font-semibold">Queja hacia el profesor <span class="text-3xl text-pink-900">{{$profesor->nombre_completo}}</span></h2>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-2 mt-3 text-lg text-center bg-red-400 rounded-lg shadow-md">
                <h2 class="font-semibold text-white">{{ $error }}</h2>
            </div>
        @endforeach
    @endif

    <form action="/queja/create" method="POST">
        @csrf
        <input type="hidden" name="profesores_id" value="{{$profesor->id}}">
        <div class="flex flex-col items-center w-2/3 gap-10 p-6 mx-auto mt-6 bg-white rounded-lg shadow-md">
            <div>
                <label for="categoria" class="block mb-6 text-2xl text-center text-pink-900">Motivo de la queja</label>
                <select name="c_queja_id" id="categoria">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="w-full">
                <label for="comentario" class="block mb-2 text-2xl text-center">Comentario</label>
                <textarea name="comentario" id="comentario" cols="30" rows="10" class="w-full p-3 shadow-md"></textarea>
            </div>

            <button class="w-4/5 px-5 py-2 mx-auto text-xl text-white duration-300 bg-pink-900 rounded-md hover:bg-pink-800">Enviar</button>
        </div>
    </form>
</x-app-layout>
