<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#eaf4ff">
    <title>Login SIM-Surat</title>
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
<body class="login-body flex min-h-screen items-center justify-center px-4 py-10 font-sans antialiased">
    <div class="ambient ambient-one" aria-hidden="true"></div>
    <div class="ambient ambient-two" aria-hidden="true"></div>
    <button type="button" class="theme-toggle login-theme-toggle" data-theme-toggle aria-label="Aktifkan tema gelap" title="Ganti tema">
        <span class="theme-toggle-track"><svg class="theme-icon theme-icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"/></svg><svg class="theme-icon theme-icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M20.2 15.1A8.5 8.5 0 0 1 8.9 3.8 8.5 8.5 0 1 0 20.2 15.1Z"/></svg></span>
        <span class="theme-toggle-label">Tema</span>
    </button>
    <section class="login-card relative z-10 w-full max-w-md rounded-3xl p-8 sm:p-10">
        <div class="login-symbol mx-auto mb-5 flex size-14 items-center justify-center rounded-2xl">
            <svg class="size-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5.5A1.5 1.5 0 0 1 5.5 4h13A1.5 1.5 0 0 1 20 5.5v13a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 4 18.5zM8 4v16m4-11h4m-4 4h4"/></svg>
        </div>
        <p class="login-eyebrow mb-2 text-center text-xs font-bold uppercase tracking-[.22em]">Sistem Administrasi</p>
        <h1 class="login-title mb-2 text-center text-2xl font-bold tracking-tight">Login SIM-Surat</h1>
        <p class="login-subtitle mb-8 text-center text-sm">Silakan masuk untuk melanjutkan ke dashboard.</p>
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-5">
            @csrf
            <div>
                <label class="form-label mb-2 block text-sm font-semibold" for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="username" required class="theme-input block w-full rounded-xl px-4 py-3 text-sm shadow-sm focus:outline-none" placeholder="nama@email.com">
                @error('email') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="form-label mb-2 block text-sm font-semibold" for="password">Password</label>
                <input id="password" type="password" name="password" autocomplete="current-password" required class="theme-input block w-full rounded-xl px-4 py-3 text-sm shadow-sm focus:outline-none" placeholder="Masukkan password">
                @error('password') <p class="mt-2 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="primary-button mt-2 w-full rounded-xl px-4 py-3 text-sm font-bold">Masuk ke Dashboard <span aria-hidden="true">→</span></button>
        </form>
        <p class="login-foot mt-8 text-center text-xs">© {{ date('Y') }} Sistem Informasi Surat</p>
    </section>
</body>
</html>
