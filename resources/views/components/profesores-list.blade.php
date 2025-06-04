@props(['profesores'])

@foreach($profesores as $profesor)
        {{-- Card --}}
        <a class="p-5 mt-4 bg-white rounded-lg shadow-md w-9/28" href="/profesor?id={{$profesor->id}}">
            {{-- Nombre y Estrellas --}}
            <div class="flex items-center w-full ">
                <div class="flex items-center gap-2">
                    <div class="flex items-center justify-center w-12 h-12 text-2xl font-bold text-white bg-pink-900 rounded-full">
                        @php
                            $pl = substr($profesor->nombre_completo, 0, 2);
                            echo $pl;
                        @endphp
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-pink-900">{{$profesor->nombre_completo}}</h3>
                        <h4>{{$profesor->academia->nombre}}</h4>
                    </div>
                </div>
            </div>
        </a>
@endforeach