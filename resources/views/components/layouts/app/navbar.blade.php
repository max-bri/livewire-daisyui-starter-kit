<nav class="navbar bg-base-100 shadow-md">
    <div class="flex-1">
        <a href="/" class="btn btn-ghost normal-case text-xl">LaravelApp</a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            @guest
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            @endguest
            @auth
                <li><a href="/dashboard">Dashboard</a></li>
                <li><x-user.avatar-dropdown /></li>
            @endauth
        </ul>
    </div>
</nav>
