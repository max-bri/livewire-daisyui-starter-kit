<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        Password::sendResetLink($this->only('email'));

        session()->flash('status', __('A reset link will be sent if the account exists.'));
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header title="Forgot password" description="Enter your email to receive a password reset link" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink" class="flex flex-col gap-6">
        <!-- Email Address -->
        <label class="form-control w-full">
            <span class="label label-text">{{ __('Email Address') }}</span>
            <input wire:model="email" type="email" name="email" required autofocus placeholder="email@example.com" class="input input-bordered w-full" />
        </label>

        <button type="submit" class="btn btn-primary w-full">{{ __('Email password reset link') }}</button>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-400">
        Or, return to
        <x-text-link href="{{ route('login') }}">log in</x-text-link>
    </div>
</div>
