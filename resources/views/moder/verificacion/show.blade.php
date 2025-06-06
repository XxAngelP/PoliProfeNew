<x-app-layout>
    <div class="p-6 mt-2 bg-white rounded-lg shadow-md">
        <div>
            <h1 class="mb-1 text-4xl font-bold text-pink-900">{{$user->name.' '.$user->first_last_name.' '.$user->second_last_name}}</h1>
            <h3 class="text-lg">Correo: {{$user->email}}</h3>
            <h3 class="text-lg">Boleta: {{$user->boleta}}</h3>
            <h3 class="text-lg">Creado: {{$user->created_at}}</h3>
        </div>
    </div>   
    <div class="flex gap-2 mt-6" >
        <div class="flex-1 w-full p-5 bg-white rounded-md shadow-md">
            <img src="{{asset('storage/images/' . $user->img_url)}}" alt="Foto que envia el usuario" class="w-3/4 mx-auto">
        </div>
        <div class="flex-1 p-5 bg-white rounded-md shadow-md">
            <h2 class="mb-2 text-3xl font-bold text-pink-900">Validar Boleta y Verificar</h2>
            <form action="/verificacion/verificar" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$user->id}}">
                <div>
                    <label for="Boleta" class="text-lg">Boleta:</label>
                    <input type="text" name="boleta" class="w-full p-3 rounded-md outline-none bg-stone-200">
                </div>
                <div>
                    <label for="Boleta" class="text-lg">Confirmar Boleta:</label>
                    <input type="text" name="confirmarBoleta" class="w-full p-3 rounded-md outline-none bg-stone-200">
                </div>
                <div class="flex justify-center gap-2 mt-4">
                    <button class="p-2 text-lg duration-300 bg-blue-800 rounded-md text-stone-50 hover:bg-blue-700 hover:text-xl">Validar</button>
                </form>
                <form action="/verificacion/rechazar" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button class="p-2 text-lg duration-300 bg-red-800 rounded-md text-stone-50 hover:bg-red-700 hover:text-xl">Rechazar</button>
                </form>
        </div>
        </div>    
    </div> 
</x-app-layout>