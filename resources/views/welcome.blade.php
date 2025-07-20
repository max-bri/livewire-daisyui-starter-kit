<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <script>
    (function(){
        var m=document.cookie.match(/theme=([^;]+)/);
        var theme=m?m[1]:null;
        if(theme){document.documentElement.setAttribute('data-theme',theme);}
    })();
    </script>
</head>
<body class="min-h-screen bg-base-200">
    <div class="min-h-screen flex flex-col justify-between">
        <header>
            <nav class="navbar bg-base-100 shadow-md min-h-[4rem] flex items-center">
                <div class="flex-1 flex items-center">
                    <a href="/" class="btn btn-ghost normal-case text-xl">Laravel 12</a>
                </div>
                <div class="flex-none flex items-center">
                    <ul class="menu menu-horizontal px-1 flex items-center">
                        @guest
                            <li class="flex items-center"><a href="/login" class="py-0">Login</a></li>
                            <li class="flex items-center"><a href="/register" class="py-0">Register</a></li>
                        @endguest
                        @auth
                            <li class="flex items-center"><a href="/dashboard" class="py-0">Dashboard</a></li>
                            <li class="flex items-center"><x-user.avatar-dropdown /></li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </header>
        <section class="hero bg-base-200">
        <div class="hero-content flex flex-col sm:flex-row items-center gap-8 rounded-lg shadow-2xl bg-base-100">
            <img src="https://laravel.com/img/logomark.min.svg" class="w-24 sm:w-24 lg:w-48 p-4" alt="Laravel Logo"/>
            <div class="text-center sm:text-left max-w-md">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold">
                Welcome to Laravel&nbsp;12
            </h1>
            <p class="py-6 text-lg sm:text-xl lg:text-2xl">
                Production‑ready Starter Kit with: <span class="font-bold">Laravel 12 + Livewire 3 + daisyUI 5</span>.  
                Fully responsive, customizable, and ready for your next big idea.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                @guest
                <a href="/login"    class="btn btn-primary w-full sm:w-auto">Login</a>
                <a href="/register" class="btn btn-secondary w-full sm:w-auto">Register</a>
                @endguest
                @auth
                <a href="/dashboard" class="btn btn-primary w-full sm:w-auto">Go to Dashboard</a>
                @endauth
            </div>
            </div>
        </div>
        </section>
        <footer class="footer p-4 bg-base-100 text-base-content text-center border-t mt-8 justify-items-center place-items-center">
            <aside class="grid-flow-col">
                <span class="font-semibold">Laravel 12 + Livewire 3 + daisyUI 5 Starter Kit</span>
            </aside>
            <nav class="grid-flow-col gap-4">
                <a href="https://laravel.com" class="link link-hover">Laravel</a>
                <a href="https://laravel.com/docs" class="link link-hover">Docs</a>
                <a href="https://laracasts.com" class="link link-hover">Laracast</a>
                <a href="https://github.com/laravel/laravel" class="link link-hover">GitHub</a>
            </nav>
        </footer>
    </div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>
