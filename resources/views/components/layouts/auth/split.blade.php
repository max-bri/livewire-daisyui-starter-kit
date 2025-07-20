<div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
    <div class="bg-primary text-primary-content relative hidden h-full flex-col p-10 lg:flex border-r border-base-300">
        <div class="absolute inset-0 opacity-70"></div>
        <a href="{{ route('home') }}" class="relative z-20 flex items-center text-lg font-medium" wire:navigate>
            <span class="flex h-10 w-10 items-center justify-center rounded-md">
                <x-app-logo-icon class="mr-2 h-7 fill-current text-primary-content" />
            </span>
            {{ config('app.name', 'Laravel') }}
        </a>

        @php
            [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
        @endphp

        <div class="relative z-20 mt-auto">
            <blockquote class="space-y-2">
                <p class="text-lg">&ldquo;{{ trim($message) }}&rdquo;</p>
                <footer class="text-sm">{{ trim($author) }}</footer>
            </blockquote>
        </div>
    </div>
    <div class="w-full lg:p-8">
        <div class="mx-auto flex w-full flex-col justify-center space-y-6 sm:w-[350px]">
            <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                <span class="flex h-9 w-9 items-center justify-center rounded-md">
                    <x-app-logo-icon class="size-9 fill-current text-primary" />
                </span>
                <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
            </a>
            {{ $slot }}
        </div>
    </div>
</div>
