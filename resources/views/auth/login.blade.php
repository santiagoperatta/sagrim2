<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

		<!-- Password -->
		<div class="mt-4">
			<x-input-label for="password" :value="__('Contraseña')" />
			<div class="relative">
				<x-text-input id="password" class="block mt-1 w-full"
								type="password"
								name="password"
								required autocomplete="current-password" />
				<button type="button" onmousedown="showPassword()" onmouseup="hidePassword()" onmouseleave="hidePassword()" class="absolute inset-y-0 right-0 px-3 py-2">
					<!-- Utilizamos un ícono de Heroicons para mostrar y ocultar la contraseña -->
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="black" class="w-5 h-5">
						<path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
						<path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
					</svg>					  
				</button>
			</div>
			<x-input-error :messages="$errors->get('password')" class="mt-2" />
		</div>

		<script>
			var passwordInput = document.getElementById("password");

			function showPassword() {
				passwordInput.type = "text";
			}

			function hidePassword() {
				passwordInput.type = "password";
			}
		</script>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
            </label>
        </div>


        <div class="flex items-center justify-end mt-4">

			<!--<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="{{ route('register') }}">
				{{ __('¿No tienes una cuenta?') }}
			</a>-->

            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="{{ route('password.request') }}">
                    {{ __('Olvidaste tu contraseña?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
