<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Identifikasi Gangguan Tidur')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-mist">

    <div class="min-h-screen bg-[radial-gradient(ellipse_at_top,_#1F3B4D_0%,_#122430_55%)] pb-10 sm:pb-16">
        <div class="mx-auto max-w-xl px-4 pt-10 sm:pt-16">

            <div class="mb-6 text-center text-white">
                <span class="mb-3 inline-flex h-11 w-11 items-center justify-center rounded-full bg-moon text-abyss-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"/>
                    </svg>
                </span>
                <h1 class="font-display text-2xl tracking-tight sm:text-3xl">Sistem Pakar Gangguan Tidur</h1>
                <p class="mt-1 text-sm text-white/60">Identifikasi dini tingkat insomnia dengan metode Certainty Factor</p>
            </div>

            <div class="overflow-hidden rounded-3xl bg-white shadow-2xl shadow-black/30">
                <!-- Stepper -->
                <div class="flex items-start justify-between gap-2 px-6 pt-6 sm:px-10 sm:pt-8">
                    @php
                        $steps = [1 => 'Data Diri', 2 => 'Pilih Gejala', 3 => 'Hasil'];
                    @endphp
                    @foreach ($steps as $num => $label)
                        <div class="flex flex-1 flex-col items-center text-center">
                            <div class="flex h-9 w-9 items-center justify-center rounded-full text-sm font-semibold
                                {{ $step > $num ? 'bg-abyss text-white' : ($step == $num ? 'bg-moon text-abyss-dark' : 'bg-mist text-slate-light') }}">
                                @if ($step > $num)
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" d="m5 13 4 4L19 7"/></svg>
                                @else
                                    {{ $num }}
                                @endif
                            </div>
                            <span class="mt-2 text-xs font-medium {{ $step >= $num ? 'text-ink' : 'text-slate-light' }} sm:text-sm">{{ $label }}</span>
                        </div>
                        @if ($num < 3)
                            <div class="mt-4 h-px flex-1 bg-line sm:mt-4.5"></div>
                        @endif
                    @endforeach
                </div>

                <div class="p-6 sm:p-10">
                    @yield('content')
                </div>
            </div>

            <p class="mt-6 text-center text-xs text-white/40">
                Sistem ini merupakan alat bantu identifikasi dini dan tidak menggantikan diagnosis tenaga kesehatan profesional.
            </p>
        </div>
    </div>
</body>
</html>
