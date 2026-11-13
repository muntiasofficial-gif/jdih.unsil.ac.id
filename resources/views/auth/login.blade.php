<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <div style="position: relative; width: 100%; margin-top: 4px;">
                    <input id="password" class="block w-full" style="border: 1px solid #d1d5db;
                                border-radius: 6px;
                                display: block;
                                width: 100%;
                                height: 42px;                                                                                               
                                padding: 0 65px 0 12px;
                                box-sizing: border-box;" 
                                type="password" name="password" requred autocomplete="current-password"/>
                    <button type="button" id="toggle-password" onclick="togglePassword()" 
                        style="position: absolute;
                                right: 13px;
                                top: 35%;
                                transform: tanslateY(-50%);
                                border: none;
                                background: transparent;
                                padding: 0;
                                margin: 0;
                                color: #6b7280;
                                font-size: 12px;
                                cursor: pointer;
                                line-height: 1;">SHOW
                    </button>
                </div>
            </div>
                <script>
                    function togglePassword() {
                        const password = document.getElementById('password');
                        const button = document.getElementById('toggle-password');
                        if (password.type === 'password') {
                            password.type = 'text';
                            button.textContent = 'HIDE';
                            
                        } else {
                            password.type = 'password';
                            button.textContent = 'SHOW';
                            
                        }
                    }
                </script>
            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
