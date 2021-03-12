<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" placeholder="{{ __('Name') }}" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" placeholder="{{ __('Email') }}" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2 text-white">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-white underline hover:text-yellow-300">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-white underline hover:text-yellow-300">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-white underline hover:text-yellow-300" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
