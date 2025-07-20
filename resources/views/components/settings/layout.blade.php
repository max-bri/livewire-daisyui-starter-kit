<div class="flex items-start max-md:flex-col">
    <div class="mr-10 w-full pb-4 md:w-[220px]">
        <ul class="menu bg-base-100 rounded-box">
            <li>
                <a href="{{ route('settings.profile') }}" wire:navigate @class([
                    'active font-semibold menu-active:bg-primary/10 menu-active:text-primary' => request()->routeIs('settings.profile')
                ])>
                    <!-- Heroicons: User (your SVG, h-4 w-4) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-2 opacity-70">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    Profile
                </a>
            </li>
            <li>
                <a href="{{ route('settings.password') }}" wire:navigate @class([
                    'active font-semibold menu-active:bg-primary/10 menu-active:text-primary' => request()->routeIs('settings.password')
                ])>
                    <!-- Heroicons: Key v2 (your SVG, h-4 w-4) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-2 opacity-70">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                    </svg>
                    Password
                </a>
            </li>
            <li>
                <a href="{{ route('settings.appearance') }}" wire:navigate @class([
                    'active font-semibold menu-active:bg-primary/10 menu-active:text-primary' => request()->routeIs('settings.appearance')
                ])>
                    <!-- Heroicons: Brush (your SVG, h-4 w-4) -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4 mr-2 opacity-70">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42" />
                    </svg>
                    Appearance
                </a>
            </li>
        </ul>
    </div>

    <div class="flex-1 self-stretch max-md:pt-6">
        @if (!empty($heading))
            <h2 class="text-2xl font-bold mb-1">{{ $heading }}</h2>
        @endif
        @if (!empty($subheading))
            <p class="mb-4 text-base-content/70">{{ $subheading }}</p>
        @endif
        <div class="mt-5 w-full max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
