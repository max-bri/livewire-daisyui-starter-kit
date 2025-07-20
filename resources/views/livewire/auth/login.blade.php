<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header title="Log in to your account" description="Enter your email and password below to log in" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <label class="form-control w-full">
            <span class="label label-text">{{ __('Email address') }}</span>
            <input wire:model="email" type="email" name="email" required autofocus autocomplete="email" placeholder="email@example.com" class="input input-bordered w-full" />
        </label>

        <!-- Password -->
        <div class="relative">
            <label class="form-control w-full">
                <span class="label label-text">{{ __('Password') }}</span>
                <input wire:model="password" type="password" name="password" required autocomplete="current-password" placeholder="Password" class="input input-bordered w-full" />
            </label>
            @if (Route::has('password.request'))
                <x-text-link class="absolute right-0 top-0" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </x-text-link>
            @endif
        </div>

        <!-- Remember Me -->
        <label class="cursor-pointer flex items-center gap-2">
            <input wire:model="remember" type="checkbox" class="checkbox" />
            <span class="label-text">{{ __('Remember me') }}</span>
        </label>

        <div class="flex items-center justify-end">
            <button type="submit" class="btn btn-primary w-full">{{ __('Log in') }}</button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        Don't have an account?
        <x-text-link href="{{ route('register') }}">Sign up</x-text-link>
    </div>
</div>
