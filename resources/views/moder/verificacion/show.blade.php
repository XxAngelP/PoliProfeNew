<x-app-layout>
    <div class="bg-white rounded-lg shadow-md p-6 mt-6">
        <div>
            <h1 class="text-4xl font-bold mb-1 text-pink-900">{{$user->name.' '.$user->first_last_name.' '.$user->second_last_name}}</h1>
            <h3 class="text-lg">Correo: {{$user->email}}</h3>
            <h3 class="text-lg">Boleta: {{$user->boleta}}</h3>
            <h3 class="text-lg">Creado: {{$user->created_at}}</h3>
        </div>
    </div>   
    <div class="flex gap-2 mt-6" >
        <div class="flex-1 bg-white rounded-md shadow-md p-5 w-full">
            <img src="" alt="Foto que envia el usuario" class="w-3/4 mx-auto">
        </div>
        <div class="flex-1 bg-white rounded-md shadow-md p-5">
            <h2 class="text-3xl font-bold mb-2 text-pink-900">Validar Boleta y Verificar</h2>
            <form action="">
                <div>
                    <label for="Boleta" class="text-lg">Boleta:</label>
                    <input type="text" class="bg-stone-200 rounded-md w-full p-3 outline-none">
                </div>
                <div>
                    <label for="Boleta" class="text-lg">Confirmar Boleta:</label>
                    <input type="text" class="bg-stone-200 rounded-md w-full p-3 outline-none">
                </div>
                <div class="flex gap-2 mt-4 justify-center">
                    <button class="bg-blue-800 text-stone-50 p-2 text-lg rounded-md hover:bg-blue-700 hover:text-xl duration-300">Validar</button>
                    <a href="/verificacion/index" class="bg-red-800 text-stone-50 p-2 text-lg rounded-md hover:bg-red-700 hover:text-xl duration-300">Rechazar</a>
                </div>
            </form>
        </div>    
    </div> 
</x-app-layout>