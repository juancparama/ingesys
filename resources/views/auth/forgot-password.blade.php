<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{route('login.index')}}">
                <img src="{{url('/assets/imgs/logo-ig-lg.png')}}">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidate tu contraseña? Introduce tu dirección de email y te enviaremos un enlace para cambiarla.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reiniciar Contraseña') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
