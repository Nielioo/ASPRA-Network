<x-guest-layout>
    @livewire('my-navigation-menu')
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        @if ($errors->any())
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <div>
                    <span class="font-medium">Whoops!</span> There were some problems with your input.
                    <ul class="pt-2 max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error for="name" />
            </div>

            <div class="mt-4">
                <x-label for="uname" value="{{ __('Username') }}" />
                <x-input id="uname" class="block mt-1 w-full" type="text" name="uname" :value="old('uname')"
                    required autocomplete="uname" />
                <x-input-error for="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="email" />
                <x-input-error for="email" />
            </div>

            <div class="mt-4">
                <x-label for="position" value="{{ __('Jabatan') }}" />
                {{-- <x-input id="position" class="block mt-1 w-full" type="text" name="position" :value="old('position')"
                    required autocomplete="position" /> --}}
                {{-- Input Dropdown --}}
                <select id="position" name="position"
                    class="border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                    <option value="" class="text-slate-400"
                        {{ is_null(old('position')) ? 'selected' : '' }}>
                        Select an option</option>
                    <option value="Employee" {{ old('position') == 'Employee' ? 'selected' : '' }}>
                        Employee
                    </option>
                    <option value="Marketing" {{ old('position') == 'Marketing' ? 'selected' : '' }}>
                        Marketing
                    </option>
                    <option value="Supervisor Marketing"
                        {{ old('position') == 'Supervisor Marketing' ? 'selected' : '' }}>
                        Supervisor Marketing
                    </option>
                    <option value="Manager" {{ old('position') == 'Manager' ? 'selected' : '' }}>
                        Manager
                    </option>
                    <option value="Director" {{ old('position') == 'Director' ? 'selected' : '' }}>
                        Director
                    </option>
                    <option value="Supervisor PPIC" {{ old('position') == 'Supervisor PPIC' ? 'selected' : '' }}>
                        Supervisor PPIC
                    </option>
                </select>
                <x-input-error for="position" />
            </div>

            <div class="mt-4">
                <x-label for="phone_number" value="{{ __('Nomor Whatsapp (format: 62XXXXXXXX)') }}" />
                <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                    :value="old('phone_number', '62')" required autocomplete="phone_number" />
                <x-input-error for="phone_number" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
                <x-input-error for="password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
                <x-input-error for="password_confirmation" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Sudah terdaftar?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
