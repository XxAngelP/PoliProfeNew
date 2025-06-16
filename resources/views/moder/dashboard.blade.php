<x-app-layout>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h1 class="mb-1 text-4xl font-bold text-pink-900">Bienvenido, {{ Auth::user()->name }}</h1>
        <h3 class="text-lg">Consulta y califica a los profesores de UPIICSA</h3>
    </div>
    
    <header class="py-6 mt-4 text-white bg-pink-900">
        <div class="max-w-4xl mx-auto text-center">
            <p class="mt-2 text-lg">La mejor plataforma para evaluar a tus profesores y mejorar la calidad educativa</p>
        </div>
    </header>
    
    <main class="w-full p-6 mx-auto mt-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-4 text-2xl font-bold text-center text-pink-900">Opciones</h2>
        <div class="flex justify-center gap-4 md:grid-cols-3">
            <div class="flex-1 p-4 text-center bg-gray-200 rounded-lg">
                <h3 class="text-lg font-bold">Verificaciones</h3>
                <p>Administra las solicitudes de verificacion de los alumnos</p>
                 <div class="mt-6 text-center">
                    <a href="/verificacion" class="px-6 py-2 text-white bg-pink-900 rounded-lg hover:bg-pink-800">Ir a verificaciones</a>
                </div>
            </div>
            <div class="flex-1 p-4 text-center bg-gray-200 rounded-lg">
                <h3 class="text-lg font-bold">Reportes</h3>
                <p>Ve, administra y elmina reportes</p>
                <div class="mt-6 text-center">
                    <a href="/reporte" class="px-6 py-2 text-white bg-pink-900 rounded-lg hover:bg-pink-800">Ir a reportes</a>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
