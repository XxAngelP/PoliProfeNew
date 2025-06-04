<x-app-layout>
    <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md">
        <div>
            <h1 class="mb-1 text-4xl font-bold text-pink-900">{{$profesor->nombre_completo}} <span class="ml-3 text-gray-400 text-md">{{$edad}} años</span></h1>
            <h3 class="text-lg">Academia de {{$profesor->academia->nombre}}</h3>
        </div>

        <div class="flex items-center justify-center gap-10">
            <a href="/comentario/create?id={{$profesor->id}}" class="px-8 py-4 text-white bg-pink-900 rounded shadow-md hover:bg-pink-800">Agregar Comentario</a>
            <a href="/queja/create?id={{$profesor->id}}" class="px-8 py-4 text-white bg-pink-900 rounded shadow-md hover:bg-pink-800">Agregar Queja</a>
        </div>
    </div>

    <div class="grid grid-cols-[2fr_1fr] gap-4 w-full">
        <div>

            <div class="p-2 mt-6 bg-white rounded-lg shadow-md ">
                <h2 class="mb-1 text-3xl font-bold text-center text-pink-900">Comentarios</h2>
            </div>

            @foreach($comentarios as $comentario)
                @if($comentario->status <= 2)
                    <div class="p-6 mt-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <h1 class="mb-1 text-4xl font-bold text-pink-900">{{$comentario->materia->nombre}}</h1>
                            @if($comentario->user->is_auth == 1)
                                <x-gmdi-verified class="w-6 text-blue-500"/>
                            @endif
                        </div>
                        <h3 class="mt-3 text-lg">{{$comentario->r_com}}</h3>
                        <div class="flex items-center justify-between">
                            <p class="mt-1 text-gray-400">{{$comentario->created_at}}</p>
                            <button popovertarget = "reportar-comentario-{{$comentario->id}}" class="flex items-center text-red-300 hover:text-red-600"><x-gmdi-warning-amber-r class="w-6"/>Reportar Comentario</button>
                            <div popover id="reportar-comentario-{{$comentario->id}}" class="w-1/2 p-6 m-auto bg-white rounded-lg shadow-md">
                                <h2 class="mb-1 text-3xl font-bold text-center text-pink-900">Quieres Reportar este comentario?</h2>
                                    <div>
                                        <div class="p-6 mt-6 bg-white rounded-lg shadow-md">
                                        <div class="flex items-center justify-between">
                                            <h1 class="mb-1 text-4xl font-bold text-pink-900">{{$comentario->materia->nombre}}</h1>
                                            @if($comentario->user->is_auth == 1)
                                                <x-gmdi-verified class="w-6 text-blue-500"/>
                                            @endif
                                        </div>
                                        <h3 class="mt-3 text-lg">{{$comentario->r_com}}</h3>
                                        </div>
                                    </div>
                                <div>
                                    <form action="/reportar" method="POST">
                                        <input type="hidden" name="comentario" value="{{$comentario->id}}">
                                        <input type="hidden" name="user" value="{{$comentario->user->id}}">
                                        <label for="motivo" class="block mb-2 text-3xl font-semibold text-center text-pink-900 mt-3">Motivo de Reporte</label>
                                        <textarea name="motivo" id="" cols="30" rows="10"  class="w-full p-3 border-gray-100 shadow-md outline-none border-1" required></textarea>
                                        <div class="flex justify-center w-full">
                                            <button class="px-8 py-4 mx-auto text-white rounded shadow-md bg-amber-200 hover:bg-amber-300">Reportar</button>
                                            <button type="button" popovertarget = "reportar-comentario-{{$comentario->id}}" class="px-8 py-4 mx-auto text-white bg-red-300 rounded shadow-md hover:bg-red-400">Cancelar</button>    
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            <div class="p-2 mt-6 bg-white rounded-lg shadow-md">
                <h2 class="mb-1 text-3xl font-bold text-center text-pink-900">Quejas</h2>
            </div>

            @foreach($quejas as $queja)
                @if($queja->estatus == 0)
                    <div class="p-6 mt-6 bg-white rounded-lg shadow-md">
                        <div class="flex items-center justify-between">
                            <h1 class="mb-1 text-4xl font-bold text-pink-900">{{$queja->categoria->nombre}}</h1>
                            @if($queja->user->is_auth == 1)
                                <x-gmdi-verified class="w-6 text-blue-500"/>
                            @endif
                        </div>
                        <h3 class="mt-3 text-lg">{{$queja->comentario}}</h3>
                        <div class="flex items-center justify-between">
                            <p class="mt-1 text-gray-400 text-end">{{$queja->created_at}}</p>
                            <button popovertarget = "reportar-queja-{{$queja->id}}" class="flex items-center text-red-300 hover:text-red-600"><x-gmdi-warning-amber-r class="w-6"/>Reportar Queja</button>
                            <div popover id="reportar-queja-{{$queja->id}}" class="w-1/2 p-6 m-auto bg-white rounded-lg shadow-md">
                                <h2 class="mb-1 text-3xl font-bold text-center text-pink-900">Quieres Reportar esta queja?</h2>
                                    <div>
                                        <div class="p-6 mt-6 bg-white rounded-lg shadow-md">
                                        <div class="flex items-center justify-between">
                                            <h1 class="mb-1 text-4xl font-bold text-pink-900">{{$queja->categoria->nombre}}</h1>
                                            @if($queja->user->is_auth == 1)
                                                <x-gmdi-verified class="w-6 text-blue-500"/>
                                            @endif
                                        </div>
                                        <h3 class="mt-3 text-lg">{{$queja->comentario}}</h3>
                                        </div>
                                    </div>
                                <div>
                                    <form action="/reportar" method="POST">
                                        <input type="hidden" name="comentario" value="{{$queja->id}}">
                                        <input type="hidden" name="user" value="{{$queja->user->id}}">
                                        <label for="motivo" class="block mb-2 text-2xl text-center text-pink-900">Motivo de Reporte</label>
                                        <textarea name="motivo" id="" cols="30" rows="10"  class="w-full p-3 border-gray-100 shadow-md outline-none border-1" required></textarea>
                                        <div class="flex justify-center w-full">
                                            <button class="px-8 py-4 mx-auto text-white rounded shadow-md bg-amber-200 hover:bg-amber-300">Reportar</button>
                                            <button type="button" popovertarget = "reportar-queja-{{$queja->id}}" class="px-8 py-4 mx-auto text-white bg-red-300 rounded shadow-md hover:bg-red-400">Cancelar</button>    
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="p-6 mt-6 bg-white rounded-lg shadow-md">
            <h1 class="mb-1 text-3xl font-bold text-pink-900">Estadisticas</h1>

            <div class="mt-3">
                <h2 class="text-lg text-pink-900 text-semibold">Dominio de la materia</h2>
                <p>Conoce bien los temas y explica con claridad</p>
                <div class="flex mt-1">
                    @for ($i = 0; $i < $r_dm; $i++)
                        <x-heroicon-s-star class="w-5 text-amber-500"/>
                    @endfor
                </div>
            </div>

            <div class="mt-5">
                <h2 class="text-lg text-pink-900 text-semibold">Claridad al enseñar</h2>
                <p>Sus explicaciones son faciles de entender, usa ejemplos practicos</p>
                <div class="flex mt-1">
                    @for ($i = 0; $i < $r_ce; $i++)
                        <x-heroicon-s-star class="w-5 text-amber-500"/>
                    @endfor
                </div>
            </div>

            <div class="mt-5">
                <h2 class="text-lg text-pink-900 text-semibold">Motivacion en interes por los alumnos</h2>
                <p>Fomenta la participacion, mantiene el interes de la clase</p>
                <div class="flex mt-1">
                    @for ($i = 0; $i < $r_mia; $i++)
                        <x-heroicon-s-star class="w-5 text-amber-500"/>
                    @endfor
                </div>
            </div>

            <div class="mt-5">
                <h2 class="text-lg text-pink-900 text-semibold">Organizacion de las clases</h2>
                <p>Las sesiones tienen estructura logica y buen ritmo</p>
                <div class="flex mt-1">
                    @for ($i = 0; $i < $r_oc; $i++)
                        <x-heroicon-s-star class="w-5 text-amber-500"/>
                    @endfor
                </div>
            </div>

            <div class="mt-5">
                <h2 class="text-lg text-pink-900 text-semibold">Retro alimentacion util</h2>
                <p>Da comentarios constructivos sobre trabajos y examenes</p>
                <div class="flex mt-1">
                    @for ($i = 0; $i < $r_ru; $i++)
                        <x-heroicon-s-star class="w-5 text-amber-500"/>
                    @endfor
                </div>
            </div>

            <div class="mt-5">
                <h2 class="text-lg text-pink-900 text-semibold">Disposicion para resolver dudas</h2>
                <p>Atiende preguntas con paciencia y ofrece ayuda fuera de clases si es necesario</p>
                <div class="flex mt-1">
                    @for ($i = 0; $i < $r_drd; $i++)
                        <x-heroicon-s-star class="w-5 text-amber-500"/>
                    @endfor
                </div>
            </div>

            <div class="mt-5">
                <h2 class="text-lg text-pink-900 text-semibold">Evaluaciones justas y relevantes</h2>
                <p>Los examenes/tareas reflejan lo enseñado y son objetivos</p>
                <div class="flex mt-1">
                    @for ($i = 0; $i < $r_ejr; $i++)
                        <x-heroicon-s-star class="w-5 text-amber-500"/>
                    @endfor
                </div>
            </div>

            <div class="mt-5">
                <h2 class="text-lg text-pink-900 text-semibold">Respeto y trato hacia los estudiantes</h2>
                <p>Es cordial, escucha y genera un ambiente de confianza</p>
                <div class="flex mt-1">
                    @for ($i = 0; $i < $r_rte; $i++)
                        <x-heroicon-s-star class="w-5 text-amber-500"/>
                    @endfor
                </div>
            </div>

            <div class="mt-5">
                <h2 class="text-lg text-pink-900 text-semibold">Resultados de aprendizaje</h2>
                <p>Los alumnos realmente aprenden y aplican lo enseñado</p>
                <div class="flex mt-1">
                    @for ($i = 0; $i < $r_ra; $i++)
                        <x-heroicon-s-star class="w-5 text-amber-500"/>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</x-app-layout>