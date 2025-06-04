<x-app-layout>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-4xl font-bold mb-1 text-pink-900">Bienvenido, Moderador!</h1>
        <h3 class="text-lg">Consulta y califica a los profesores de UPIICSA</h3>
    </div>
    
    <header class="bg-pink-900 text-white py-6 mt-4">
        <div class="max-w-4xl mx-auto text-center">
            <p class="text-lg mt-2">La mejor plataforma para evaluar a tus profesores y mejorar la calidad educativa</p>
        </div>
    </header>
    
    <main class="w-full mx-auto mt-6 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-pink-900 text-center">Opciones</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-4 bg-gray-200 rounded-lg text-center">
                <h3 class="font-bold text-lg">Verificaciones</h3>
                <p>Administra las solicitudes de verificacion de los alumnos</p>
                 <div class="text-center mt-6">
                    <a href="/verificacion" class="bg-pink-900 text-white py-2 px-6 rounded-lg hover:bg-pink-800">Ir a verificaciones</a>
                </div>
            </div>
            <div class="p-4 bg-gray-200 rounded-lg text-center">
                <h3 class="font-bold text-lg">Reportes</h3>
                <p>Ve, administra y elmina reportes</p>
                <div class="text-center mt-6">
                    <a href="/reporte/index" class="bg-pink-900 text-white py-2 px-6 rounded-lg hover:bg-pink-800">Ir a reportes</a>
                </div>
            </div>
            <div class="p-4 bg-gray-200 rounded-lg text-center">
                <h3 class="font-bold text-lg">Asignaciones de profesores</h3>
                <p>Ve, administra y elmina asignaciones de materia a profesores</p>
                <div class="text-center mt-6">
                    <a href="/asignacion/index" class="bg-pink-900 text-white py-2 px-6 rounded-lg hover:bg-pink-800">Ir a asignaciones</a>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
