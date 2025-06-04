<x-app-layout>
    @auth
    <div class="p-3 mt-4 bg-white rounded-lg shadow-md">
        <h1 class="mb-1 text-4xl font-bold text-pink-900">Bienvenido, {{ Auth::user()->name }}</h1>
        <h3 class="text-lg">Consulta y califica a los profesores de UPIICSA</h3>
    </div>
    @endauth
    
    <header class="py-6 mt-4 text-white bg-pink-900">
        <div class="max-w-4xl mx-auto text-center">
            <p class="mt-2 text-lg">La mejor plataforma para evaluar a tus profesores y mejorar la calidad educativa</p>
        </div>
    </header>
    
    <main class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-bold text-pink-900">¿Cómo funciona PoliProfe?</h2>
        <p class="mb-4 text-lg">PoliProfe permite a los alumnos calificar y dejar comentarios sobre sus profesores, ayudando a mejorar la educación mediante retroalimentación honesta y constructiva.</p>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <div class="p-4 text-center bg-gray-200 rounded-lg">
                <h3 class="text-lg font-bold">Regístrate</h3>
                <p>Crea tu cuenta en PoliProfe y accede a la evaluación de profesores.</p>
            </div>
            <div class="p-4 text-center bg-gray-200 rounded-lg">
                <h3 class="text-lg font-bold">Evalúa</h3>
                <p>Califica a tus profesores y deja comentarios sobre su desempeño.</p>
            </div>
            <div class="p-4 text-center bg-gray-200 rounded-lg">
                <h3 class="text-lg font-bold">Consulta</h3>
                <p>Revisa las opiniones de otros estudiantes y elige a los mejores profesores.</p>
            </div>
        </div>

        @guest
        <div class="mt-6 text-center">
            <a href="{{route('login')}}" class="px-6 py-2 text-white bg-pink-900 rounded hover:bg-pink-800">Comenzar Ahora</a>
        </div>        
        @endguest
    </main>
</x-app-layout>
