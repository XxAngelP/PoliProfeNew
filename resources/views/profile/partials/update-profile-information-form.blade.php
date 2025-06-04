<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informacion de Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza tu informacion de perfil y dirección de correo electronico.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)" required autofocus autocomplete="name" disabled/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="first_last_name" :value="__('Apellido Paterno')" />
            <x-text-input id="first_last_name" name="first_last_name" type="text" class="block w-full mt-1" :value="old('first_last_name', $user->first_last_name)" required autofocus autocomplete="name" disabled/>
            <x-input-error class="mt-2" :messages="$errors->get('first_last_name')" />
        </div>

        <div>
            <x-input-label for="second_last_name" :value="__('Apellido Materno')" />
            <x-text-input id="second_last_name" name="second_last_name" type="text" class="block w-full mt-1" :value="old('second_last_name', $user->second_last_name)" required autofocus autocomplete="name" disabled/>
            <x-input-error class="mt-2" :messages="$errors->get('second_last_name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Correo Electronico')" />
            <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
