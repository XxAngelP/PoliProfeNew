<x-app-layout>
    <div class="p-6 bg-white rounded-lg shadow-md">
        <h2 class="mb-1 text-3xl font-semibold">Comentario hacia el profesor <span class="text-4xl text-pink-900">{{$profesor->nombre_completo}}</span></h2>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-2 mt-3 text-lg text-center bg-red-400 rounded-lg shadow-md">
                <h2 class="font-semibold text-white">{{ $error }}</h2>
            </div>
        @endforeach
    @endif


    <div>
        <form action="/comentario/create" method="POST">
            @csrf
            <input type="hidden" name="profesores_id" value={{$profesor->id}}>

            <div class="flex items-start gap-3 mt-6">
                {{-- Comentario --}}
                <div class="flex-1">
                    <div class="p-4 mb-4 bg-white rounded-md">
                        <label class="block mb-2 font-semibold text-center text-gray-600">Materia</label>
                        <select name="materia_id" id="materia_id" class="w-full rounded-md" required >
                            <option value="" disabled selected>Selecciona una materia</option>
                            @foreach ($materias as $materia)
                                <option value="{{$materia->id}}">{{$materia->nombre}}</option>  
                            @endforeach
                        </select>
                    </div>

                    <div class="p-4 mb-4 bg-white rounded-md shadow-md">
                        <label class="block mb-2 font-semibold text-gray-600">Comentario:</label>
                        <textarea class="w-full border-gray-300 rounded-md outline-none border-1"  name="r_com" id="r_com" cols="30" rows="10" required></textarea>
                    </div>

                    <div class="flex justify-center">
                        <button class="w-3/4 px-5 py-2 mx-auto text-xl text-white duration-300 bg-pink-900 rounded-md hover:bg-pink-800">Enviar</button>
                    </div>
                </div>

                {{-- Stats --}}
                <div class="flex-1 p-4 bg-white rounded-md shadow-md">
                    <div class="flex flex-col items-center w-full mb-4">
                        <label class="block mb-2 text-2xl font-semibold text-gray-600">Dominio de la materia:</label>
                        <p>Conoce bien los temas y explica con claridad</p>
                        <div class="flex w-3/4 gap-2">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="r_dm" name="r_dm">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full mb-4">
                        <label class="block mb-2 text-2xl font-semibold text-gray-600">Claridad al enseñar:</label>
                        <p>Sus explicaciones son faciles de entender, usa ejemplos practicos</p>
                        <div class="flex w-3/4 gap-2">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="r_ce" name="r_ce">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full mb-4">
                        <label class="block mb-2 text-2xl font-semibold text-gray-600">Motivacion en interes por los alumnos:</label>
                        <p>Fomenta la participacion, mantiene el interes de la clase</p>
                        <div class="flex w-3/4 gap-2">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="r_mia" name="r_mia">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full mb-4">
                        <label class="block mb-2 text-2xl font-semibold text-gray-600">Organizacion de las clases:</label>
                        <p>Las sesiones tienen estructura logica y buen ritmo</p>
                        <div class="flex w-3/4 gap-2">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="r_oc" name="r_oc">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full mb-4">
                        <label class="block mb-2 text-2xl font-semibold text-gray-600">Retro alimentacion util:</label>
                        <p>Da comentarios constructivos sobre trabajos y examenes</p>
                        <div class="flex w-3/4 gap-2">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="r_ru" name="r_ru">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full mb-4">
                        <label class="block mb-2 text-2xl font-semibold text-gray-600">Disposicion para resolver dudas:</label>
                        <p>Atiende preguntas con paciencia y ofrece ayuda fuera de clases si es necesario</p>
                        <div class="flex w-3/4 gap-2">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="r_drd" name="r_drd">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full mb-4">
                        <label class="block mb-2 text-2xl font-semibold text-gray-600">Evaluaciones justas y relevantes:</label>
                        <p>Los examenes/tareas reflejan lo enseñado y son objetivos</p>
                        <div class="flex w-3/4 gap-2">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="r_ejr" name="r_ejr">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full mb-4">
                        <label class="block mb-2 text-2xl font-semibold text-gray-600">Respeto y trato hacia los estudiantes:</label>
                        <p>Es cordial, escucha y genera un ambiente de confianza</p>
                        <div class="flex w-3/4 gap-2">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="r_rte" name="r_rte">
                            <p>5</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center w-full mb-4">
                        <label class="block mb-2 text-2xl font-semibold text-gray-600">Resultados de aprendizaje:</label>
                        <p>Los alumnos realmente aprenden y aplican lo enseñado</p>
                        <div class="flex w-3/4 gap-2">
                            <p>0</p>
                            <input type="range" min="0" max="5" step="1" class="w-full accent-pink-900" id="r_ra" name="r_ra">
                            <p>5</p>
                        </div>
                    </div>
                </div>    
            </div>
        </form>
    </div>
</x-app-layout>