<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="bg-preto-fosco p-6 rounded-lg shadow-md">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" class="text-branco" />
            <x-text-input id="name" class="block mt-1 w-full bg-cinza-escuro text-branco border border-cinza-escuro rounded-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-dourado-brilhante" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-branco" />
            <x-text-input id="email" class="block mt-1 w-full bg-cinza-escuro text-branco border border-cinza-escuro rounded-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-dourado-brilhante" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-branco" />
            <x-text-input id="password" class="block mt-1 w-full bg-cinza-escuro text-branco border border-cinza-escuro rounded-lg"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-dourado-brilhante" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-branco" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full bg-cinza-escuro text-branco border border-cinza-escuro rounded-lg"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-dourado-brilhante" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <a class="underline text-sm text-dourado-brilhante hover:text-dourado-escuro" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="bg-dourado-brilhante text-preto-fosco hover:bg-dourado-escuro">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
