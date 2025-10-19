<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('We have sent an OTP to your email address. Please enter it below to proceed with password reset.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.otp.verify') }}">
        @csrf

        <!-- Email Address -->
        <input type="hidden" name="email" value="{{ $email }}">

        <!-- OTP -->
        <div>
            <x-input-label for="otp" :value="__('OTP')" />
            <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" :value="old('otp')" required autofocus />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Verify OTP') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
