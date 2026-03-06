<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Toko Indonesia - Gerai</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        main {
            flex: 1 0 auto;
            width: 100%;
        }
        footer {
            flex-shrink: 0;
            width: 100%;
        }
    </style>
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-950">

    <nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="text-xl font-semibold text-gray-900 dark:text-white tracking-tight">
                            TOKO <span class="text-gray-500 dark:text-gray-400 font-light">INDONESIA</span>
                        </a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <a href="{{ route('gudang.index') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:border-gray-300 dark:hover:border-gray-700 transition">
                            Gudang
                        </a>
                        <a href="{{ route('gerai.index') }}" 
                           class="inline-flex items-center px-1 pt-1 border-b-2 border-gray-900 dark:border-white text-sm font-medium text-gray-900 dark:text-white">
                            Gerai
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white dark:bg-gray-900 shadow-sm pt-20">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div>
                <span class="text-xs font-medium text-gray-500 dark:text-gray-500 uppercase tracking-wider">INFORMASI</span>
                <h2 class="text-2xl font-light text-gray-900 dark:text-white mt-1">
                    Daftar Gerai
                </h2>
            </div>
        </div>
    </header>

    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-900 shadow-sm rounded-md border border-gray-200 dark:border-gray-800 p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <div class="text-xs text-gray-500 dark:text-gray-500">Total Gerai</div>
                        <div class="text-2xl font-light text-gray-900 dark:text-white">{{ $gerais->count() }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 dark:text-gray-500">Kota</div>
                        <div class="text-2xl font-light text-gray-900 dark:text-white">{{ $gerais->pluck('kota')->unique()->count() }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 dark:text-gray-500">Tersebar di</div>
                        <div class="text-2xl font-light text-gray-900 dark:text-white">{{ $gerais->pluck('kota')->unique()->implode(', ') }}</div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($gerais as $gerai)
                <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-md shadow-sm hover:shadow-md transition p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $gerai->nama }}</h3>
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-300 rounded-full text-xs font-mono">
                            {{ $gerai->id_gerai }}
                        </span>
                    </div>
                    <div class="space-y-2 text-sm">
                        <div class="flex items-start text-gray-600 dark:text-gray-400">
                            <svg class="h-4 w-4 mr-2 text-gray-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>{{ $gerai->alamat }}</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-400">
                            <svg class="h-4 w-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span>{{ $gerai->kota }}</span>
                        </div>
                        <div class="flex items-center text-gray-600 dark:text-gray-400">
                            <svg class="h-4 w-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>{{ $gerai->telepon }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3">
                    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-md p-12 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        <p class="mt-4 text-gray-500 dark:text-gray-400">Tidak ada data gerai</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </main>

    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-xs text-gray-500 dark:text-gray-500 text-center">
                © 2026 Toko Indonesia · Sistem Pergudangan
            </p>
        </div>
    </footer>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>