<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login &middot; Sistem Pakar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-[radial-gradient(ellipse_at_top,_#1F3B4D_0%,_#122430_60%)]">
    <div class="flex min-h-screen items-center justify-center px-4 py-10">
        <div class="w-full max-w-sm">
            <div class="mb-6 text-center text-white">
                <span class="mb-3 inline-flex h-12 w-12 items-center justify-center rounded-full bg-moon text-abyss-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 1 1-4-4 4 4 0 0 0 4 4Zm-4 13a8 8 0 0 0 7.646-5.646A9 9 0 1 1 6.354 5.354 8 8 0 0 0 12 20Z"/></svg>
                </span>
                <h1 class="font-display text-xl tracking-tight">Sistem Pakar</h1>
                <p class="mt-1 text-sm text-white/60">Masuk sebagai Admin / Pakar</p>
            </div>

            <div class="card p-6 sm:p-8">
                @if ($errors->any())
                    <div class="mb-4 rounded-xl border border-danger/20 bg-danger/5 px-4 py-3 text-sm text-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="field-label">Username</label>
                        <input type="text" name="username" class="field-input" placeholder="Masukkan username" value="{{ old('username') }}" required autofocus>
                    </div>
                    <div>
                        <label class="field-label">Password</label>
                        <input type="password" name="password" class="field-input" placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn-primary w-full">Masuk</button>
                </form>
            </div>

            <p class="mt-5 text-center text-sm text-white/50">
                <a href="{{ route('home') }}" class="hover:text-white">&larr; Kembali ke halaman identifikasi</a>
            </p>
        </div>
    </div>
</body>
</html>
