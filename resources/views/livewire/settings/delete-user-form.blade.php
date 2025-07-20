<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <h2 class="text-lg font-bold">{{ __('Delete Account') }}</h2>
        <p class="text-sm text-gray-500">{{ __('Delete your account and all of its resources') }}</p>
    </div>

    <!-- Modal Trigger -->
    <button class="btn btn-error" type="button" onclick="document.getElementById('delete-user-modal').showModal()">
        {{ __('Delete Account') }}
    </button>

    <!-- Modal -->
    <dialog id="delete-user-modal" class="modal">
      <div class="modal-box max-w-lg">
        <form method="dialog" wire:submit="deleteUser" class="space-y-6">
          <h3 class="font-bold text-lg">{{ __('Are you sure you want to delete your account?') }}</h3>
          <p class="py-2 text-sm">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
          </p>

          <label class="form-control w-full">
              <span class="label label-text">{{ __('Password') }}</span>
              <input wire:model="password" id="password" type="password" name="password" class="input input-bordered w-full" />
          </label>

          <div class="flex justify-end gap-2">
            <button type="button" class="btn" onclick="document.getElementById('delete-user-modal').close()">{{ __('Cancel') }}</button>
            <button type="submit" class="btn btn-error">{{ __('Delete Account') }}</button>
          </div>
        </form>
      </div>
    </dialog>
</section>
