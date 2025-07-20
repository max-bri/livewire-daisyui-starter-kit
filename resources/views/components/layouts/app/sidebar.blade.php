<!DOCTYPE html>
<html test="sidebar" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-base-200">
    <div class="drawer lg:drawer-open">
        <input id="app-drawer" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">

            <div class="w-full navbar bg-base-100 lg:hidden">
                <label for="app-drawer" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 6.75h16.5m-16.5 5.25h16.5m-16.5 5.25h16.5" /></svg>
                </label>
                <div class="flex-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2" wire:navigate>
                        <x-app-logo class="h-8 w-8" />
                    </a>
                </div>
                <x-user.avatar-dropdown />
            </div>
            <main class="flex-1 bg-base-100 min-h-screen p-8 md:p-10 lg:p-12">
                {{ $slot }}
            </main>
        </div>
        <div class="drawer-side">
            <label for="app-drawer" class="drawer-overlay"></label>
            <aside class="w-64 bg-base-200 text-base-content flex flex-col h-full border-r border-base-300">
                <div class="p-4 flex items-center justify-start">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2" wire:navigate>
                        <x-app-logo class="h-8 w-8" />
                    </a>
                </div>
                <ul class="menu menu-md px-2 flex-1 w-full">
                    <li class="menu-title">Platform</li>
                    <li>
                        <a href="{{ route('dashboard') }}" @class([ 'active' => request()->routeIs('dashboard') ]) wire:navigate class="flex items-center gap-3 w-full block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 flex-shrink-0">
                              <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu menu-md px-2 w-full">
                    <li class="menu-title">Links</li>
                    <li>
                        <a href="https://github.com/laravel/livewire-starter-kit" target="_blank" class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 flex-shrink-0">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                            </svg>
                            <span>Repository</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://laravel.com/docs/starter-kits" target="_blank" class="flex items-center gap-3">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 flex-shrink-0">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                            <span>Documentation</span>
                        </a>
                    </li>
                </ul>
                <x-user.avatar-dropdown sidebar />
            </aside>
        </div>
    </div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>
