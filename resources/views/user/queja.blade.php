<x-app-layout>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold mb-1">Queja hacia el profesor <span class="text-pink-900 text-3xl">{{$profesor->nombre_completo}}</span></h2>
    </div>

    <form action="">
        <div class="flex flex-col gap-10 items-center mt-6 mx-auto bg-white rounded-lg shadow-md p-6 w-2/3">
            <div>
                <label for="" class="block text-2xl text-center mb-6 text-pink-900">Motivo de la queja</label>
                <select name="" id="">
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="w-full">
                <label for="" class="block text-center text-2xl mb-2">Comentario</label>
                <textarea name="" id="" cols="30" rows="10" class="w-full shadow-md p-3"></textarea>
            </div>

            <button class="w-4/5 mx-auto bg-pink-900 text-white px-5 py-2 text-xl rounded-md hover:bg-pink-800 duration-300">Enviar</button>
        </div>
    </form>
</x-app-layout>
