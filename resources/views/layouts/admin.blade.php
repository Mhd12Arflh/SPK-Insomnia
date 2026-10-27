<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') &middot; Sistem Pakar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-mist">

    <!-- Overlay (mobile) -->
    <div id="sidebar-overlay" class="fixed inset-0 z-30 bg-ink/40 hidden lg:hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar"
           class="fixed inset-y-0 left-0 z-40 w-64 -translate-x-full transform bg-abyss-dark text-white transition-transform duration-200 ease-out lg:translate-x-0">
        <div class="flex h-16 items-center gap-2 border-b border-white/10 px-6">
            <span class="flex h-8 w-8 items-center justify-center rounded-full bg-moon text-abyss-dark">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                    <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"/>
                </svg>
            </span>
            <span class="font-display text-lg tracking-tight">Sistem Pakar</span>
        </div>

        <nav class="flex flex-col gap-1 px-3 py-5 text-sm">
            @php
                $navItem = function ($route, $label, $icon) {
                    $active = request()->routeIs($route);
                    $base = 'flex items-center gap-3 rounded-xl px-3 py-2.5 transition-colors';
                    $state = $active ? 'bg-white/10 text-white font-semibold' : 'text-white/70 hover:bg-white/5 hover:text-white';
                    return compact('active', 'base', 'state');
                };
            @endphp

            <a href="{{ route('admin.dashboard') }}"
               class="{{ $navItem('admin.dashboard', '', '')['base'] }} {{ $navItem('admin.dashboard', '', '')['state'] }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10h14V10"/></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.gejala.index') }}"
               class="{{ $navItem('admin.gejala.*', '', '')['base'] }} {{ $navItem('admin.gejala.*', '', '')['state'] }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6M9 8h6M5 4h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Z"/></svg>
                Data Gejala
            </a>
            <a href="{{ route('admin.tingkat.index') }}"
               class="{{ $navItem('admin.tingkat.*', '', '')['base'] }} {{ $navItem('admin.tingkat.*', '', '')['state'] }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M4 20V10m8 10V4m8 16v-7"/></svg>
                Tingkat Insomnia
            </a>
            <a href="{{ route('admin.aturan.index') }}"
               class="{{ $navItem('admin.aturan.*', '', '')['base'] }} {{ $navItem('admin.aturan.*', '', '')['state'] }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v3m0 12v3M5.6 5.6l2.1 2.1m8.6 8.6 2.1 2.1M3 12h3m12 0h3M5.6 18.4l2.1-2.1m8.6-8.6 2.1-2.1"/></svg>
                Aturan (Rule)
            </a>
            <a href="{{ route('admin.hasil.index') }}"
               class="{{ $navItem('admin.hasil.*', '', '')['base'] }} {{ $navItem('admin.hasil.*', '', '')['state'] }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2M9 5a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2M9 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2m-5 8 2 2 4-4"/></svg>
                Hasil Identifikasi
            </a>
        </nav>

        <div class="absolute inset-x-0 bottom-0 border-t border-white/10 p-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-sm text-white/70 transition-colors hover:bg-white/5 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-5 w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4m5 14 5-5-5-5m5 5H9"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Main -->
    <div class="lg:pl-64">
        <header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-line bg-white/90 px-4 backdrop-blur sm:px-6">
            <button id="sidebar-toggle" type="button" class="rounded-lg p-2 text-slate hover:bg-mist lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
            <h1 class="hidden font-display text-lg text-ink sm:block">@yield('title', 'Dashboard')</h1>

            <div class="relative ml-auto">
                <button id="profile-dropdown-btn" type="button"
                        class="flex items-center gap-2 rounded-xl border border-line bg-white px-3 py-2 text-sm font-medium text-ink hover:bg-mist">
                    <span class="flex h-7 w-7 items-center justify-center rounded-full bg-moon-soft text-xs font-bold text-abyss-dark">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </span>
                    <span class="hidden sm:inline">{{ auth()->user()->name ?? 'Admin' }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="m6 9 6 6 6-6"/></svg>
                </button>
                <div id="profile-dropdown-menu" class="absolute right-0 z-30 mt-2 hidden w-44 overflow-hidden rounded-xl border border-line bg-white py-1 shadow-soft">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-danger hover:bg-danger/5">Logout</button>
                    </form>
                </div>
            </div>
        </header>

        <main class="p-4 sm:p-6 lg:p-8">
            <h1 class="mb-5 font-display text-2xl text-ink sm:hidden">@yield('title', 'Dashboard')</h1>

            @if (session('success'))
                <div class="mb-5 flex items-center gap-2 rounded-xl border border-success/20 bg-success/10 px-4 py-3 text-sm text-success">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="h-5 w-5 shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7"/></svg>
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
