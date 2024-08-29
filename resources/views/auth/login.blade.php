<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="bg-preto-fosco p-6 rounded-lg shadow-md">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-branco" />
            <x-text-input id="email" class="block mt-1 w-full bg-cinza-escuro text-branco border border-cinza-escuro rounded-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-dourado-brilhante" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-branco" />

            <x-text-input id="password" class="block mt-1 w-full bg-cinza-escuro text-branco border border-cinza-escuro rounded-lg"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-dourado-brilhante" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-branco">
                <input id="remember_me" type="checkbox" class="rounded border-cinza-escuro bg-preto-fosco text-dourado-brilhante shadow-sm focus:ring-dourado-brilhante" name="remember">
                <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-dourado-brilhante hover:text-dourado-escuro" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="bg-cinza-escuro-forte text-branco hover:bg-cinza-escuro">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
