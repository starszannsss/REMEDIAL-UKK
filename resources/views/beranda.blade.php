<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Toko Indonesia - Sistem Pergudangan</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Glass effect yang lebih halus */
        .glass-effect {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        .dark .glass-effect {
            background: rgba(17, 17, 17, 0.8);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        
        /* Card shadow yang lebih sophisticated */
        .card-shadow {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-shadow:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
            transform: translateY(-4px);
        }
        
        /* Gradient border yang lebih subtle */
        .gradient-border {
            position: relative;
            background: rgb(199, 199, 199);
            border-radius: 1rem;
            z-index: 1;
        }
        .dark .gradient-border {
            background: #111827;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            top: -1px;
            left: -1px;
            right: -1px;
            bottom: -1px;
            background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
            border-radius: 1rem;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }
        .dark .gradient-border::before {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        }
        .gradient-border:hover::before {
            opacity: 1;
        }
        
        /* Feature card yang lebih clean */
        .feature-card {
            transition: all 0.3s ease;
            border-left: 2px solid transparent;
        }
        .feature-card:hover {
            border-left-color: #9ca3af;
            background: linear-gradient(to right, rgba(156, 163, 175, 0.03), transparent);
            transform: translateX(4px);
        }
        
        /* Spacing utilities */
        .section-padding {
            padding-top: 6rem;
            padding-bottom: 6rem;
        }
        
        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="antialiased bg-white dark:bg-gray-950">

    <!-- Navbar -->
    <nav class="glass-effect fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <span class="text-xl font-semibold tracking-tight">
                        <span class="text-gray-900 dark:text-white">TOKO</span>
                        <span class="text-gray-500 dark:text-gray-400 ml-1 font-light">INDONESIA</span>
                    </span>
                </div>
                
                <!-- Navigation -->
                <div class="flex items-center space-x-8">
                    <a href="#tentang" 
                       class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition relative group py-2">
                        Tentang
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 dark:bg-white transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#fitur" 
                       class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition relative group py-2">
                        Fitur
                        <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-900 dark:bg-white transition-all group-hover:w-full"></span>
                    </a>
                    
                    @auth
                        <a href="{{ route('admin.dashboard') }}" 
                           class="text-sm px-5 py-2 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-100 transition shadow-sm">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="text-sm px-5 py-2 bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-100 transition shadow-sm">
                            Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-40 pb-24 px-6 relative overflow-hidden">
        <!-- Subtle pattern background -->
        <div class="absolute inset-0 opacity-[0.02]">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, currentColor 1px, transparent 0); background-size: 40px 40px;"></div>
        </div>
        
        <div class="max-w-4xl mx-auto text-center relative">
            <div class="inline-block mb-8 animate-fade-in">
                <span class="text-xs font-medium text-gray-500 dark:text-gray-500 tracking-[0.2em] px-5 py-2 border border-gray-200 dark:border-gray-800 rounded-full uppercase">
                    Sistem Manajemen Inventori
                </span>
            </div>
            
            <h1 class="text-5xl md:text-6xl font-light text-gray-900 dark:text-white mb-4 tracking-tight">
                Sistem Pergudangan
            </h1>
            
            <h2 class="text-3xl md:text-4xl font-light text-gray-400 dark:text-gray-500 mb-8">
                Toko Indonesia
            </h2>
            
            <p class="text-lg text-gray-500 dark:text-gray-500 max-w-2xl mx-auto leading-relaxed">
                Kelola stok barang dan supplier dengan sistem yang sederhana, cepat, dan efisien.
            </p>
        </div>
    </section>

    <!-- Cards Section -->
    <section class="pb-24 px-6">
        <div class="max-w-5xl mx-auto">
            <div class="grid md:grid-cols-2 gap-8">
                
                <!-- Petugas Card -->
                <div class="gradient-border card-shadow p-8">
                    <div class="mb-6">
                        <div class="w-14 h-14 bg-gray-100 dark:bg-gray-800 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">Petugas Gudang</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-600 leading-relaxed">
                            Akses untuk melihat dan memantau stok barang di gudang.
                        </p>
                    </div>
                    
                    <a href="{{ route('gudang.index') }}" 
                       class="inline-block w-full text-center py-3 text-sm text-gray-700 dark:text-gray-500 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
                        Masuk sebagai Petugas
                    </a>
                    
                    <p class="text-xs text-gray-400 dark:text-gray-600 mt-4 text-center">
                        Akses langsung · Tanpa login
                    </p>
                </div>

                <!-- Admin Card -->
                <div class="gradient-border card-shadow p-8">
                    <div class="mb-6">
                        <div class="w-14 h-14 bg-gray-100 dark:bg-gray-800 rounded-xl flex items-center justify-center mb-4">
                            <svg class="w-7 h-7 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white mb-2">Administrator</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-600 leading-relaxed">
                            Akses penuh untuk mengelola data barang dan supplier.
                        </p>
                    </div>
                    
                    @auth
                        <a href="{{ route('admin.dashboard') }}" 
                           class="inline-block w-full text-center py-3 text-sm bg-gray-900 dark:bg-white text-white dark:text-gray-900 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-100 transition-all shadow-sm">
                            Lanjut ke Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="inline-block w-full text-center py-3 text-sm bg-gray-900 dark:bg-gray-200 text-white dark:text-gray-900 rounded-lg hover:bg-gray-800 dark:hover:bg-gray-100 transition-all shadow-sm">
                            Login sebagai Admin
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Section -->
    <section id="tentang" class="py-24 px-6 bg-gray-50/50 dark:bg-gray-900/50 border-t border-gray-100 dark:border-gray-800">
        <div class="max-w-5xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="text-xs font-medium text-gray-400 dark:text-gray-600 tracking-widest uppercase mb-3 block">01 · TENTANG</span>
                <h2 class="text-3xl font-light text-gray-900 dark:text-white mb-3 tracking-tight">
                    Tentang Aplikasi
                </h2>
                <div class="w-16 h-px bg-gray-300 dark:bg-gray-700 mx-auto"></div>
            </div>
            
            <!-- Cards -->
            <div class="grid md:grid-cols-3 gap-6">
                <div class="text-center p-6">
                    <div class="text-5xl font-thin text-gray-300 dark:text-gray-700 mb-4">01</div>
                    <h3 class="text-base font-medium text-gray-900 dark:text-white mb-3">Manajemen Barang</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-500 leading-relaxed">
                        Kelola data barang dengan mudah dan terstruktur.
                    </p>
                </div>
                
                <div class="text-center p-6">
                    <div class="text-5xl font-thin text-gray-300 dark:text-gray-700 mb-4">02</div>
                    <h3 class="text-base font-medium text-gray-900 dark:text-white mb-3">Data Supplier</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-500 leading-relaxed">
                        Informasi lengkap supplier dalam satu tempat.
                    </p>
                </div>
                
                <div class="text-center p-6">
                    <div class="text-5xl font-thin text-gray-300 dark:text-gray-700 mb-4">03</div>
                    <h3 class="text-base font-medium text-gray-900 dark:text-white mb-3">Monitoring Stok</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-500 leading-relaxed">
                        Pantau kondisi stok barang secara real-time.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    <section id="fitur" class="py-24 px-6">
        <div class="max-w-6xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <span class="text-xs font-medium text-gray-400 dark:text-gray-600 tracking-widest uppercase mb-3 block">02 · FITUR</span>
                <h2 class="text-3xl font-light text-gray-900 dark:text-white mb-3 tracking-tight">
                    Fitur Unggulan
                </h2>
                <div class="w-16 h-px bg-gray-300 dark:bg-gray-700 mx-auto"></div>
            </div>

            <!-- Feature Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="feature-card p-6 bg-white dark:bg-gray-900 rounded-xl border border-gray-100 dark:border-gray-800">
                    <span class="text-xs font-mono text-gray-400 dark:text-gray-600 mb-3 block">F01</span>
                    <h3 class="text-base font-medium text-gray-900 dark:text-white mb-2">Pencarian Cepat</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-500 leading-relaxed">
                        Cari barang berdasarkan ID atau nama dengan instant search.
                    </p>
                </div>

                <div class="feature-card p-6 bg-white dark:bg-gray-900 rounded-xl border border-gray-100 dark:border-gray-800">
                    <span class="text-xs font-mono text-gray-400 dark:text-gray-600 mb-3 block">F02</span>
                    <h3 class="text-base font-medium text-gray-900 dark:text-white mb-2">Filter Kategori</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-500 leading-relaxed">
                        Saring barang berdasarkan kategori untuk memudahkan pencarian.
                    </p>
                </div>

                <div class="feature-card p-6 bg-white dark:bg-gray-900 rounded-xl border border-gray-100 dark:border-gray-800">
                    <span class="text-xs font-mono text-gray-400 dark:text-gray-600 mb-3 block">F03</span>
                    <h3 class="text-base font-medium text-gray-900 dark:text-white mb-2">CRUD Barang</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-500 leading-relaxed">
                        Tambah, edit, hapus data barang dengan mudah.
                    </p>
                </div>

                <div class="feature-card p-6 bg-white dark:bg-gray-900 rounded-xl border border-gray-100 dark:border-gray-800">
                    <span class="text-xs font-mono text-gray-400 dark:text-gray-600 mb-3 block">F04</span>
                    <h3 class="text-base font-medium text-gray-900 dark:text-white mb-2">CRUD Supplier</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-500 leading-relaxed">
                        Kelola data supplier dengan sistem terintegrasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 px-6 border-t border-gray-100 dark:border-gray-800">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center text-xs text-gray-500 dark:text-gray-600">
                <div>© 2026 Toko Indonesia. All rights reserved.</div>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <span>Sistem Pergudangan v1.0</span>
                    <span class="text-gray-300 dark:text-gray-700">|</span>
                    <span>Deadline: 9 Maret 2026</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Smooth Scroll Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>