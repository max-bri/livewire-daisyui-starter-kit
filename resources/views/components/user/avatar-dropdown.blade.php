@props(['user' => auth()->user(), 'sidebar' => false])

@php
    $dropdownClass = $sidebar ? 'dropdown dropdown-top mt-auto py-4 px-2 w-full ' : 'dropdown dropdown-end';
    $labelClass = $sidebar
        ? 'btn btn-ghost w-full flex items-center gap-2 px-2 py-1 rounded-lg cursor-pointer justify-start'
        : 'btn btn-ghost btn-circle flex items-center mr-2 sm:mr-4';
@endphp

<div class="{{ $dropdownClass }}">
    <label tabindex="0" class="{{ $labelClass }}">
        <div class="w-10 h-10 rounded-full bg-neutral text-neutral-content flex items-center justify-center aspect-square text-base font-medium leading-none">
            {{ $user->initials() }}
        </div>
        @if($sidebar)
            <span class="ml-2 max-w-[110px] truncate text-base font-semibold">{{ $user->name }}</span>
            <!-- Chevron UP -->
            <svg class="h-4 w-4 ml-1 opacity-70" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" /></svg>
        @else
            <!-- Chevron DOWN -->
            <svg class="h-4 w-4 ml-1 opacity-70" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
        @endif
    </label>
    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li class="menu-title">
            <span class="font-semibold">{{ $user->name }}</span>
            <span class="text-xs">{{ $user->email }}</span>
        </li>
      <li><a href="/settings/profile">Settings</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full text-left">Log Out</button>
            </form>
        </li>
    </ul>
</div>
