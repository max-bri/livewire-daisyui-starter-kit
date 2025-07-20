<nav class="navbar bg-base-100 border-b border-base-300">
    <div class="flex-none lg:hidden">
        <label for="app-drawer" class="btn btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </label>
    </div>
    <div class="flex-1">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2 ml-2 mr-5 lg:ml-0" wire:navigate>
            <x-app-logo class="size-8" />
        </a>
        <ul class="menu menu-horizontal px-1 max-lg:hidden">
            <li><a href="{{ route('dashboard') }}" @class([ 'active' => request()->routeIs('dashboard') ]) wire:navigate>Dashboard</a></li>
        </ul>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <li>
                <a href="#" title="Search" class="tooltip" data-tip="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 10.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" /></svg>
                </a>
            </li>
            <li class="max-lg:hidden">
                <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" title="Repository" class="tooltip" data-tip="Repository">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18V3H3zm14 6H7v8h10V9zm-7 6v-4h4v4H10z" /></svg>
                </a>
            </li>
            <li class="max-lg:hidden">
                <a href="https://laravel.com/docs/starter-kits" target="_blank" title="Documentation" class="tooltip" data-tip="Documentation">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h2.5a2 2 0 002 2h3a2 2 0 002-2H19a2 2 0 012 2v12a2 2 0 01-2 2z" /></svg>
                </a>
            </li>
        </ul>

        <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full bg-neutral text-neutral-content flex items-center justify-center">
                    {{ auth()->user()->initials() }}
                </div>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li class="menu-title">
                    <span class="font-semibold">{{ auth()->user()->name }}</span>
                    <span class="text-xs">{{ auth()->user()->email }}</span>
                </li>
                <li><a href="/settings/profile" wire:navigate>{{ __('Settings') }}</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <button type="submit" class="w-full text-left">{{ __('Log Out') }}</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main class="bg-base-100 min-h-screen">
    {{ $slot }}
</main>