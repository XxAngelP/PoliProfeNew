<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- First Last Name -->
        <div class="mt-4">
            <x-input-label for="first_last_name" :value="__('Apellido Paterno')" />
            <x-text-input id="first_last_name" class="block w-full mt-1" type="text" name="first_last_name" :value="old('first_last_name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('first_last_name')" class="mt-2" />
        </div>

        <!-- Second Last Name -->
        <div class="mt-4">
            <x-input-label for="second_last_name" :value="__('Apellido Materno')" />
            <x-text-input id="second_last_name" class="block w-full mt-1" type="text" name="second_last_name" :value="old('second_last_name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('second_last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <h2 class="mt-2">Puedes subir una foto de tu credencial u horario para verificarte(Opcional)</h2>
        <div class="relative flex items-center justify-center w-full mt-4">
            <input type="file" name="image" id="file-upload" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
            <label for="file-upload" class="px-6 py-3 font-semibold text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">📁 Seleccionar Archivo</label>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('¿Ya estas registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
