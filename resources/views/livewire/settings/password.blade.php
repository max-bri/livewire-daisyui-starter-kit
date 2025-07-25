<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout heading="Update password" subheading="Ensure your account is using a long, random password to stay secure">
        <form wire:submit="updatePassword" class="mt-6 space-y-6">
            <label class="form-control w-full">
                <span class="label label-text">{{ __('Current password') }}</span>
                <input wire:model="current_password" id="update_password_current_passwordpassword" type="password" name="current_password" required autocomplete="current-password" class="input input-bordered w-full" />
            </label>
            <label class="form-control w-full">
                <span class="label label-text">{{ __('New password') }}</span>
                <input wire:model="password" id="update_password_password" type="password" name="password" required autocomplete="new-password" class="input input-bordered w-full" />
            </label>
            <label class="form-control w-full">
                <span class="label label-text">{{ __('Confirm Password') }}</span>
                <input wire:model="password_confirmation" id="update_password_password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="input input-bordered w-full" />
            </label>

            <div class="flex items-center gap-4 mt-4">
                <div class="flex items-center justify-end">
                    <button type="submit" class="btn btn-primary w-full">{{ __('Save') }}</button>
                </div>
                <x-action-message class="me-3" on="password-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>
    </x-settings.layout>
</section>
