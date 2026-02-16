<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ config('app.locale') === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="/favicon.png" sizes="any">
    <link rel="apple-touch-icon" href="/favicon.png">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxAppearance
</head>

<body class="min-h-screen bg-white text-zinc-500 antialiased">

    {{-- HEADER SECTION --}}
    <header class="absolute left-0 right-0 top-0 z-50 py-6">
        <flux:header class="z-50 mx-auto max-w-7xl">
            <flux:sidebar.toggle class="bg-white lg:hidden" icon="bars-2" inset="left" />
            <a class="hidden lg:block" href="/"><img src="{{ asset('logo-white.png') }}" alt="logo"
                    class="h-8 lg:h-16"></a>
            <flux:spacer />
            <flux:navbar class="-mb-px max-lg:hidden">
                <flux:navbar.item href="/" current> <span class="text-white">{{ __('Home') }}</span>
                </flux:navbar.item>
                <flux:navbar.item icon:trailing="arrow-up-left"
                    href="https://alkhaleej.com.sa/%d9%85%d9%86-%d9%86%d8%ad%d9%86/" target="_blank" class="text-white">
                    <span class="text-white">{{ __('About') }}</span>
                </flux:navbar.item>
                <flux:navbar.item icon:trailing="arrow-up-left" href="https://alkhaleej.com.sa/contactus-ar/"
                    target="_blank" class="text-white"><span class="text-white">{{ __('Contact') }}</span>
                </flux:navbar.item>
            </flux:navbar>
        </flux:header>

        <flux:sidebar sticky collapsible="mobile"
            class="z-50 border-r border-zinc-200 bg-zinc-50 lg:hidden dark:border-zinc-700 dark:bg-zinc-900">
            <flux:sidebar.header>
                <a href="/" class="h-16"><img src="{{ asset('logo.png') }}" alt="logo"
                        class="object-contain object-center"></a>
                <flux:sidebar.collapse
                    class="in-data-flux-sidebar-on-desktop:not-in-data-flux-sidebar-collapsed-desktop:-mr-2" />
            </flux:sidebar.header>
            <flux:sidebar.nav>
                <flux:sidebar.item href="/" current> {{ __('Home') }} </flux:sidebar.item>
                <flux:sidebar.item icon:trailing="arrow-up-left"
                    href="https://alkhaleej.com.sa/%d9%85%d9%86-%d9%86%d8%ad%d9%86/" target="_blank">
                    {{ __('About') }}
                </flux:sidebar.item>
                <flux:sidebar.item icon:trailing="arrow-up-left" href="https://alkhaleej.com.sa/contactus-ar/"
                    target="_blank">
                    {{ __('Contact') }}
                </flux:sidebar.item>
            </flux:sidebar.nav>
        </flux:sidebar>
    </header>

    {{ $slot }}

    {{-- FOOTER SECTION --}}
    <footer class="bg-zinc-900 text-white">
        <div class="wrapper flex max-w-7xl items-center justify-between">
            <p>&copy; {{ date('Y') }} {{ __('All rights reserved.') }}</p>
        </div>
    </footer>

    @livewireScripts
    @fluxScripts
</body>

</html>
