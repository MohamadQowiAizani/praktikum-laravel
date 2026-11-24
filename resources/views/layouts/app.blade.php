<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#eaf4ff">
    <title>@yield('title', 'Sistem Informasi Surat')</title>

    <script>
        (() => {
            const savedTheme = localStorage.getItem('sisurat-theme');
            document.documentElement.dataset.theme = savedTheme === 'dark' ? 'dark' : 'light';
        })();
    </script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-body flex min-h-screen flex-col font-sans antialiased">
    <div class="ambient ambient-one" aria-hidden="true"></div>
    <div class="ambient ambient-two" aria-hidden="true"></div>
    <header class="app-header sticky top-0 z-20 border-b backdrop-blur-xl">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-x-6 gap-y-3 px-4 py-3 sm:px-6">
            <a href="{{ route('dashboard') }}" class="brand flex items-center gap-2 text-lg font-bold">
                <span class="brand-mark" aria-hidden="true">
                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5v12.5H3.75zM3.75 7l8.25 6 8.25-6" /></svg>
                </span>
                <span>Sistem Informasi Surat</span>
            </a>
            <nav class="flex flex-wrap items-center gap-1.5">
                <a href="{{ route('dashboard') }}" class="nav-link rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'is-active' : '' }}">Dashboard</a>
                <a href="{{ route('surat-masuk.index') }}" class="nav-link rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('surat-masuk.*') ? 'is-active' : '' }}">Surat Masuk</a>
                <a href="{{ route('surat-keluar.index') }}" class="nav-link rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('surat-keluar.*') ? 'is-active' : '' }}">Surat Keluar</a>
                <button type="button" class="theme-toggle" data-theme-toggle aria-label="Aktifkan tema gelap" title="Ganti tema">
                    <span class="theme-toggle-track"><svg class="theme-icon theme-icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg><svg class="theme-icon theme-icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20.2 15.1A8.5 8.5 0 0 1 8.9 3.8 8.5 8.5 0 1 0 20.2 15.1Z"/></svg></span>
                    <span class="theme-toggle-label">Tema</span>
                </button>
                @auth
                    <span class="user-label ml-2 border-l pl-4 text-sm">Masuk sebagai: <strong>{{ auth()->user()->name }}</strong></span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="logout-button ml-2 rounded-lg px-3 py-2 text-sm font-semibold">Keluar</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    <main class="app-main mx-auto w-full max-w-6xl flex-1 px-4 py-8 sm:px-6">
        @yield('content')
    </main>

    <footer class="app-footer border-t py-5 text-center text-sm">
        <p>Sistem Informasi Surat <span class="footer-dot">•</span> Pengelolaan surat lebih praktis</p>
    </footer>
</body>
</html>
