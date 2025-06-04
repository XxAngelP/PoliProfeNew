<x-app-layout>
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-3xl font-semibold mb-1">Comentario hacia el profesor <span class="text-pink-900 text-4xl">{{$profesor->nombre_completo}}</span></h2>
    </div>

    <div>
        <form action="/comentario/store" method="POST">
            <input type="hidden" name="profesorId" value={{$profesor->id}}>

            <div class="flex gap-3 mt-6 items-start">
                {{-- Comentario --}}
                <div class="flex-1">
                    <div class="mb-4 bg-white rounded-md p-4">
                        <label class="block text-gray-600 mb-2 font-semibold text-center">Materia</label>
                        <select name="materia" id="" class="w-full rounded-md">
                            <option value="" disabled selected>Selecciona una materia</option>
                            @foreach ($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->nombre}}</option>  
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4 bg-white rounded-md p-4 shadow-md">
                        <label class="block text-gray-600 mb-2 font-semibold">Comentario:</label>
                        <textarea class="w-full rounded-md outline-none border-1 border-gray-300"  name="comentario" id="comentario" cols="30" rows="10"></textarea>
                    </div>

                    <div class="flex justify-center">
                        <button class="w-3/4 bg-pink-900 text-white px-5 py-2 text-xl rounded-md hover:bg-pink-800 duration-300 mx-auto">Enviar</button>
                    </div>
                </div>

                {{-- Stats --}}
                <div class="flex-1 bg-white rounded-md p-4 shadow-md">
                    <div class="mb-4 flex flex-col items-center w-full">
                        <label class="block font-semibold text-2xl text-gray-600 mb-2">Dominio de la materia:</label>
                        <p>Conoce bien los temas y explica con claridad</p>
                        <div class="flex gap-2 w-3/4">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="servicio">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col items-center w-full">
                        <label class="block font-semibold text-2xl text-gray-600 mb-2">Claridad al enseñar:</label>
                        <p>Sus explicaciones son faciles de entender, usa ejemplos practicos</p>
                        <div class="flex gap-2 w-3/4">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="servicio">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col items-center w-full">
                        <label class="block font-semibold text-2xl text-gray-600 mb-2">Motivacion en interes por los alumnos:</label>
                        <p>Fomenta la participacion, mantiene el interes de la clase</p>
                        <div class="flex gap-2 w-3/4">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="servicio">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col items-center w-full">
                        <label class="block font-semibold text-2xl text-gray-600 mb-2">Organizacion de las clases:</label>
                        <p>Las sesiones tienen estructura logica y buen ritmo</p>
                        <div class="flex gap-2 w-3/4">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="servicio">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col items-center w-full">
                        <label class="block font-semibold text-2xl text-gray-600 mb-2">Retro alimentacion util:</label>
                        <p>Da comentarios constructivos sobre trabajos y examenes</p>
                        <div class="flex gap-2 w-3/4">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="servicio">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col items-center w-full">
                        <label class="block font-semibold text-2xl text-gray-600 mb-2">Disposicion para resolver dudas:</label>
                        <p>Atiende preguntas con paciencia y ofrece ayuda fuera de clases si es necesario</p>
                        <div class="flex gap-2 w-3/4">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="servicio">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col items-center w-full">
                        <label class="block font-semibold text-2xl text-gray-600 mb-2">Evaluaciones justas y relevantes:</label>
                        <p>Los examenes/tareas reflejan lo enseñado y son objetivos</p>
                        <div class="flex gap-2 w-3/4">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="servicio">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col items-center w-full">
                        <label class="block font-semibold text-2xl text-gray-600 mb-2">Respeto y trato hacia los estudiantes:</label>
                        <p>Es cordial, escucha y genera un ambiente de confianza</p>
                        <div class="flex gap-2 w-3/4">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="servicio">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col items-center w-full">
                        <label class="block font-semibold text-2xl text-gray-600 mb-2">Resultados de aprendizaje:</label>
                        <p>Los alumnos realmente aprenden y aplican lo enseñado</p>
                        <div class="flex gap-2 w-3/4">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="servicio">
                            <p>5</p>
                        </div>
                    </div>
                </div>    
            </div>
        </form>
    </div>
</x-app-layout>