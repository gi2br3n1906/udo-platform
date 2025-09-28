<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

<?php $__env->startPush('styles'); ?>
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .hero-pattern {
            background-image:
                radial-gradient(circle at 25% 25%, rgba(255,255,255,0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(255,255,255,0.1) 0%, transparent 50%);
        }

        /* Modal specific styles */
        #registrationModal {
            z-index: 9999 !important;
            overflow-y: auto !important;
        }

        #modalContent {
            background: white !important;
            position: relative;
            z-index: 10000 !important;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
            max-height: 90vh !important;
            overflow-y: auto !important;
        }

        /* Ensure form elements are visible */
        #registrationModal input,
        #registrationModal select,
        #registrationModal button,
        #registrationModal label {
            position: relative !important;
            z-index: 10001 !important;
        }

        /* Custom animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes glow {
            0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.5); }
            50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.8); }
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .glow-effect {
            animation: glow 3s ease-in-out infinite;
        }

        /* Responsive modal adjustments */
        @media (max-height: 700px) {
            #modalContent {
                max-height: 85vh !important;
                padding: 1rem !important;
            }

            #modalContent h3 {
                font-size: 1.125rem !important;
                margin-bottom: 0.5rem !important;
            }

            #modalContent .space-y-4 > div {
                margin-bottom: 0.75rem !important;
            }
        }

        @media (max-height: 600px) {
            #modalContent {
                max-height: 80vh !important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

    <!-- Hero Section - Optimized for LCP -->
    <section class="pt-24 pb-20 bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 relative">
        <!-- Simplified Background -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-500 rounded-full"></div>
            <div class="absolute top-3/4 right-1/4 w-64 h-64 bg-purple-500 rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-500 rounded-full"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="text-center">
                <!-- Status Badge -->
                <div class="inline-flex items-center bg-gradient-to-r from-emerald-500 to-blue-500 px-6 py-3 rounded-full mb-8 shadow-xl">
                    <div class="w-3 h-3 bg-white rounded-full mr-3 animate-pulse"></div>
                    <span class="text-white font-semibold text-sm tracking-wide">🎓 PLATFORM EXPO KAMPUS DIGITAL</span>
                </div>

                <!-- Optimized Main Title -->
                <div class="mb-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-3 leading-tight" style="font-display: swap;">
                        <span class="text-white">University Day's Out</span>
                    </h1>
                    <div class="w-16 h-0.5 bg-yellow-400 mx-auto rounded"></div>
                </div>

                <!-- Optimized Subtitle - LCP Element -->
                <div class="text-xl sm:text-2xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed font-medium will-change-auto">
                    🚀 Platform interaktif yang menghubungkan siswa SMA dengan
                    <span class="text-yellow-400 font-semibold"><?php echo e($universityCount ?? 15); ?> universitas terbaik</span>
                    di seluruh Indonesia
                </div>

                <!-- Optimized Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12 max-w-4xl mx-auto">
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-colors duration-200">
                        <div class="text-4xl font-black text-yellow-400 mb-2"><?php echo e($universityCount ?? 15); ?></div>
                        <div class="text-gray-300 font-semibold">Universitas Partner</div>
                        <div class="text-xs text-gray-400 mt-1">PTN, PTS & Kedinasan</div>
                    </div>
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-colors duration-200">
                        <div class="text-4xl font-black text-emerald-400 mb-2">500+</div>
                        <div class="text-gray-300 font-semibold">Program Studi</div>
                        <div class="text-xs text-gray-400 mt-1">Berbagai Bidang Ilmu</div>
                    </div>
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-6 hover:bg-white/20 transition-colors duration-200">
                        <div class="text-4xl font-black text-purple-400 mb-2">100%</div>
                        <div class="text-gray-300 font-semibold">Gratis Akses</div>
                        <div class="text-xs text-gray-400 mt-1">Tanpa Biaya Apapun</div>
                    </div>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <button onclick="accessFeature('universities')" class="group relative bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-10 py-4 rounded-2xl font-black text-lg shadow-2xl hover:shadow-yellow-500/25 transition-all duration-300 transform hover:scale-105">
                        <span class="relative z-10 flex items-center">
                            🎯 Mulai Eksplorasi Sekarang
                            <svg class="w-6 h-6 ml-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </button>

                    <button onclick="accessFeature('favorites')" class="group bg-white/10 backdrop-blur-lg border-2 border-white/30 text-white px-8 py-4 rounded-2xl font-semibold text-lg hover:bg-white/20 transition-all duration-300">
                        <span class="flex items-center">
                            ❤️ Lihat Favorit
                            <svg class="w-5 h-5 ml-2 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </section>    <!-- Features Section -->
    <section class="py-24 bg-gradient-to-br from-gray-900 to-slate-800">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-gradient-to-r from-purple-500 to-pink-500 px-4 py-2 rounded-full mb-6">
                    <span class="text-white text-sm font-semibold">✨ FITUR UNGGULAN</span>
                </div>
                <h2 class="text-5xl font-black text-white mb-6">
                    Eksplorasi Universitas
                    <br>
                    <span class="bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">Super Mudah!</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Fitur-fitur canggih yang membantu kamu menemukan universitas impian dengan cara yang menyenangkan
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <!-- Feature 1 -->
                <div class="group relative bg-gradient-to-br from-blue-500/10 to-cyan-500/10 backdrop-blur-lg border border-blue-500/20 rounded-3xl p-8 hover:from-blue-500/20 hover:to-cyan-500/20 transition-all duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-transparent rounded-3xl"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform duration-300 shadow-lg shadow-blue-500/25">
                            <span class="text-2xl">🏛️</span>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4 group-hover:text-blue-400 transition-colors duration-300">Eksplorasi Universitas</h3>
                        <p class="text-gray-300 leading-relaxed">Jelajahi <span class="text-cyan-400 font-bold"><?php echo e($universityCount ?? 15); ?> universitas terbaik</span> dari PTN, PTS, dan perguruan tinggi kedinasan di Indonesia! 🎓</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative bg-gradient-to-br from-emerald-500/10 to-green-500/10 backdrop-blur-lg border border-emerald-500/20 rounded-3xl p-8 hover:from-emerald-500/20 hover:to-green-500/20 transition-all duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/5 to-transparent rounded-3xl"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform duration-300 shadow-lg shadow-emerald-500/25">
                            <span class="text-2xl">🗺️</span>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4 group-hover:text-emerald-400 transition-colors duration-300">Navigasi Lokasi</h3>
                        <p class="text-gray-300 leading-relaxed">Temukan lokasi booth universitas dengan <span class="text-emerald-400 font-bold">denah interaktif</span> yang mudah digunakan! Navigasi expo jadi super gampang 📍</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative bg-gradient-to-br from-purple-500/10 to-pink-500/10 backdrop-blur-lg border border-purple-500/20 rounded-3xl p-8 hover:from-purple-500/20 hover:to-pink-500/20 transition-all duration-500 hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-transparent rounded-3xl"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:rotate-12 transition-transform duration-300 shadow-lg shadow-purple-500/25">
                            <span class="text-2xl">❤️</span>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4 group-hover:text-purple-400 transition-colors duration-300">Sistem Favorit</h3>
                        <p class="text-gray-300 leading-relaxed">Simpan universitas favorit untuk <span class="text-purple-400 font-bold">referensi masa depan</span> dan buat wishlist universitas impianmu 🌟</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Navigation Section -->
    <section class="py-20 bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-900 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.5) 1px, transparent 0); background-size: 50px 50px;"></div>
        </div>

        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-gradient-to-r from-yellow-400 to-orange-500 px-6 py-3 rounded-full mb-6">
                    <span class="text-gray-900 text-sm font-black">🚀 AKSES FITUR LENGKAP</span>
                </div>
                <h2 class="text-5xl font-black text-white mb-6">
                    Mulai Eksplorasi
                    <br>
                    <span class="bg-gradient-to-r from-pink-400 to-purple-400 bg-clip-text text-transparent">Universitas Sekarang!</span>
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">Pilih fitur yang ingin kamu gunakan dan temukan universitas impianmu dengan mudah</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Universities Button -->
                <button onclick="accessFeature('universities')"
                        class="card-hover group bg-white border border-gray-200 rounded-2xl p-8 text-center hover:border-blue-200 hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-100 transition-colors">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Daftar Universitas</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Jelajahi <?php echo e($universityCount ?? 15); ?> universitas terbaik yang berpartisipasi</p>
                    <div class="mt-4 inline-flex items-center text-blue-600 text-sm font-medium group-hover:text-blue-700">
                        Lihat Selengkapnya
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </button>

                <!-- Site Map Button -->
                <button onclick="accessFeature('sitemap')"
                        class="card-hover group bg-white border border-gray-200 rounded-2xl p-8 text-center hover:border-green-200 hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-green-100 transition-colors">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m-6 3l6-3"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Denah Lokasi</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Navigasi mudah untuk menemukan booth universitas</p>
                    <div class="mt-4 inline-flex items-center text-green-600 text-sm font-medium group-hover:text-green-700">
                        Lihat Peta
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </button>

                <!-- Schedule Button -->
                <button onclick="accessFeature('schedule')"
                        class="card-hover group bg-white border border-gray-200 rounded-2xl p-8 text-center hover:border-purple-200 hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-100 transition-colors">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Jadwal Acara</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Seminar, workshop, dan acara menarik lainnya</p>
                    <div class="mt-4 inline-flex items-center text-purple-600 text-sm font-medium group-hover:text-purple-700">
                        Lihat Jadwal
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </button>

                <!-- Favorites Button -->
                <button onclick="accessFeature('favorites')"
                        class="card-hover group bg-white border border-gray-200 rounded-2xl p-8 text-center hover:border-red-200 hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-red-50 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-red-100 transition-colors">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Universitas Favorit</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Kelola daftar universitas pilihan Anda</p>
                    <div class="mt-4 inline-flex items-center text-red-600 text-sm font-medium group-hover:text-red-700">
                        Lihat Favorit
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Logo & Description -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">UDO</h3>
                            <p class="text-gray-400 text-sm">University Day's Out</p>
                        </div>
                    </div>
                    <p class="text-gray-300 leading-relaxed max-w-md">
                        Platform digital yang membantu siswa SMA menemukan universitas impian
                        dan merencanakan masa depan pendidikan mereka.
                    </p>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="font-semibold mb-4">Informasi Kontak</h4>
                    <div class="space-y-3 text-sm text-gray-300">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            kmw.udowsb@gmail.com
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            +62 821 3542 4893
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    © <?php echo e(date('Y')); ?> UDO Platform. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- User Interface Elements -->
    <div id="registrationModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden z-50 transition-all duration-300 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4 py-8">
            <div id="modalContent" class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 relative shadow-2xl transform transition-all duration-300 my-4 max-h-[90vh] overflow-y-auto">
                <!-- Close Button -->
                <button onclick="closeModal()" class="absolute top-4 right-4 w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition-colors">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">👋 Hai! Selamat Datang di UDO</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Untuk pengalaman terbaik dalam menjelajahi <strong><?php echo e($universityCount ?? 15); ?> universitas</strong> pilihan, mohon perkenalkan diri Anda terlebih dahulu 😊</p>
                </div>

                <form id="registrationForm" action="<?php echo e(route('visitor.store')); ?>" method="POST" class="space-y-4">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="redirect_to" id="redirectTo">

                    <div class="space-y-4 relative z-10">
                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Nama Lengkap</label>
                            <input type="text" name="full_name" required
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white text-gray-900"
                                   placeholder="Contoh: John Doe"
                                   style="position: relative; z-index: 10;">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Asal Sekolah</label>
                            <input type="text" name="school_name" required
                                   class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white text-gray-900"
                                   placeholder="Contoh: SMAN 1 Jakarta"
                                   style="position: relative; z-index: 10;">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-800 mb-2">Status</label>
                            <select name="class_level" required
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white text-gray-900 cursor-pointer"
                                    style="position: relative; z-index: 10;">
                                <option value="">Pilih status Anda</option>
                                <option value="XI">Siswa Kelas XI</option>
                                <option value="XII">Siswa Kelas XII</option>
                                <option value="Alumni">Alumni SMA/SMK</option>
                                <option value="Umum">Masyarakat Umum</option>
                            </select>
                        </div>

                        <!-- Terms -->
                        <div class="bg-blue-50 rounded-lg p-3">
                            <div class="flex items-start space-x-2">
                                <div class="flex-shrink-0">
                                    <svg class="w-4 h-4 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-xs text-blue-800">
                                    Data Anda akan disimpan selama 30 hari untuk memberikan pengalaman terbaik dalam menggunakan platform ini.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-3 mt-6 sticky bottom-0 bg-white pt-4">
                        <button type="button" onclick="closeModal()"
                                class="flex-1 px-5 py-3 bg-gray-100 text-gray-700 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-200 text-sm">
                            Batal
                        </button>
                        <button type="submit"
                                class="flex-1 px-5 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl text-sm">
                            Mulai Eksplorasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->startPush('scripts'); ?>
    <script>
        // Global variables
        let userRegistered = false;
        let userData = {};

        // Check if user is already registered via server-side check
        function checkUserRegistration() {
            console.log('=== CHECKING USER REGISTRATION STATUS ===');

            // Make AJAX request to check server registration status
            fetch('/debug/visitor-status', {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Registration check response:', data);

                const hasSession = data.session_visitor_id;
                const hasCookie = data.cookie_registered === 'true';

                if (hasSession || hasCookie) {
                    userRegistered = true;
                    if (data.cookie_name) {
                        userData.name = data.cookie_name;
                    }
                    if (data.cookie_school) {
                        userData.school = data.cookie_school;
                    }
                    updateUserInterface(true);
                    console.log('User is registered');
                } else {
                    userRegistered = false;
                    updateUserInterface(false);
                    console.log('User is not registered - will show auto popup in 2 seconds');

                    // Auto show popup after 2 seconds for homepage
                    setTimeout(() => {
                        console.log('Auto popup triggered - showing registration modal');
                        showRegistrationModal('auto');
                    }, 2000);
                }
            })
            .catch(error => {
                console.error('Registration check failed:', error);
                userRegistered = false;
                updateUserInterface(false);
                console.log('Registration check failed - will show auto popup in 2 seconds');

                // Auto show popup after 2 seconds on error
                setTimeout(() => {
                    console.log('Auto popup triggered after error - showing registration modal');
                    showRegistrationModal('auto');
                }, 2000);
            });
        }

        // Update user interface based on registration status
        function updateUserInterface(isRegistered) {
            const userWelcome = document.getElementById('userWelcome');
            const defaultStats = document.getElementById('defaultStats');
            const userName = document.getElementById('userName');
            const userInitial = document.getElementById('userInitial');

            // Add null checks to prevent errors
            if (isRegistered && userData.name) {
                if (userWelcome) userWelcome.classList.remove('hidden');
                if (defaultStats) defaultStats.classList.add('hidden');

                if (userName) userName.textContent = userData.name.split(' ')[0]; // First name only
                if (userInitial) userInitial.textContent = userData.name.charAt(0).toUpperCase();
            } else {
                if (userWelcome) userWelcome.classList.add('hidden');
                if (defaultStats) defaultStats.classList.remove('hidden');
            }
        }

        // Check if user is already registered
        function isUserRegistered() {
            return userRegistered;
        }

        // Access feature with registration check
        function accessFeature(feature) {
            console.log('Accessing feature:', feature);
            console.log('User registered:', isUserRegistered());
            console.log('User data:', userData);

            if (isUserRegistered()) {
                console.log('Redirecting to feature:', feature);
                redirectToFeature(feature);
            } else {
                console.log('Showing registration modal for feature:', feature);
                showRegistrationModal(feature);
            }
        }

        // Show registration modal
        function showRegistrationModal(feature = 'universities') {
            console.log('=== SHOWING REGISTRATION MODAL ===');
            console.log('Feature:', feature);
            console.log('Current userRegistered status:', userRegistered);

            const redirectToElement = document.getElementById('redirectTo');
            if (redirectToElement) {
                redirectToElement.value = feature;
                console.log('Set redirect to:', feature);
            } else {
                console.warn('redirectTo element not found');
            }

            const modal = document.getElementById('registrationModal');
            const modalContent = document.getElementById('modalContent');

            console.log('Modal element found:', !!modal);
            console.log('Modal content element found:', !!modalContent);

            // Show modal only if elements exist
            if (!modal || !modalContent) {
                console.error('Modal elements not found - cannot show registration modal');
                console.error('Modal:', modal);
                console.error('Modal Content:', modalContent);
                return;
            }

            console.log('Displaying modal...');
            // Show modal
            modal.classList.remove('hidden');
            modal.style.display = 'block';            // Prevent body scroll when modal is open
            document.body.style.overflow = 'hidden';

            // Ensure modal content is visible and scrollable
            modalContent.style.display = 'block';
            modalContent.style.background = '#ffffff';
            modalContent.style.zIndex = '10000';
            modalContent.style.position = 'relative';
            modalContent.style.overflowY = 'auto';
            modalContent.style.maxHeight = '90vh';

            // Reset and animate modal content
            modalContent.style.transform = 'scale(0.9)';
            modalContent.style.opacity = '0';

            // Trigger animation
            setTimeout(() => {
                modalContent.style.transform = 'scale(1)';
                modalContent.style.opacity = '1';
            }, 50);

            // Focus on first input for better UX
            setTimeout(() => {
                const firstInput = modalContent.querySelector('input[name="full_name"]');
                if (firstInput) {
                    firstInput.focus();
                }
            }, 100);

            console.log('Modal should now be visible and scrollable');
        }

        // Close modal
        function closeModal() {
            const modal = document.getElementById('registrationModal');
            const modalContent = document.getElementById('modalContent');

            // Restore body scroll
            document.body.style.overflow = '';

            // Animate out only if elements exist
            if (modalContent) {
                modalContent.style.transform = 'scale(0.9)';
                modalContent.style.opacity = '0';
            }

            // Hide modal after animation
            setTimeout(() => {
                if (modal) {
                    modal.classList.add('hidden');
                    modal.style.display = 'none';
                }
            }, 300);
        }

        // Redirect to feature
        function redirectToFeature(feature) {
            console.log('Redirecting to feature:', feature);

            switch(feature) {
                case 'universities':
                    const universityUrl = '<?php echo e(route("universities.index")); ?>';
                    console.log('Redirecting to universities:', universityUrl);
                    window.location.href = universityUrl;
                    break;
                case 'favorites':
                    const favoritesUrl = '<?php echo e(route("favorites.index")); ?>';
                    console.log('Redirecting to favorites:', favoritesUrl);
                    window.location.href = favoritesUrl;
                    break;
                case 'sitemap':
                    alert('Fitur Denah Lokasi akan segera tersedia!');
                    break;
                case 'schedule':
                    alert('Fitur Jadwal Acara akan segera tersedia!');
                    break;
                case 'info':
                    alert('Fitur Informasi akan segera tersedia!');
                    break;
            }
        }

        // Handle form submission
        const registrationForm = document.getElementById('registrationForm');
        if (registrationForm) {
            registrationForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const feature = formData.get('redirect_to');

            // Add debug logging
            console.log('Form data:', {
                full_name: formData.get('full_name'),
                school_name: formData.get('school_name'),
                class_level: formData.get('class_level'),
                redirect_to: feature
            });

            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = 'Menyimpan...';
            submitBtn.disabled = true;

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                console.log('Response status:', response.status);
                console.log('Response headers:', response.headers);

                // Always return JSON, even for error responses
                return response.json().then(data => {
                    return { data, status: response.status, ok: response.ok };
                });
            })
            .then(({ data, status, ok }) => {
                console.log('Response data:', data);

                if (ok && data.success) {
                    // Get form data
                    const fullName = formData.get('full_name');
                    const schoolName = formData.get('school_name');

                    // Update local user data
                    userData.name = fullName;
                    userData.school = schoolName;
                    userRegistered = true;

                    // Update UI
                    updateUserInterface(true);

                    closeModal();

                    // Show welcome notification
                    showWelcomeNotification(fullName.split(' ')[0]);

                    // Check if user specifically requested a feature or just auto-registered
                    if (feature && feature !== 'universities' && feature !== 'auto') {
                        // User clicked a specific feature button - redirect after delay
                        console.log('Registration completed - will redirect to:', feature);
                        setTimeout(() => {
                            if (data.redirect_url) {
                                window.location.href = data.redirect_url;
                            } else {
                                redirectToFeature(feature);
                            }
                        }, 2500);
                    } else {
                        // Auto popup from homepage - stay on homepage
                        console.log('Registration completed - staying on homepage');
                    }
                } else {
                    console.error('Registration failed:', data);

                    // Handle validation errors
                    if (status === 422 && data.errors) {
                        let errorMessages = [];
                        for (let field in data.errors) {
                            errorMessages = errorMessages.concat(data.errors[field]);
                        }
                        alert('Validasi gagal:\n' + errorMessages.join('\n'));
                    } else {
                        alert('Registrasi gagal: ' + (data.message || 'Silakan coba lagi.'));
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan jaringan: ' + error.message);
            })
            .finally(() => {
                // Restore button state
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
        }

        // Show welcome notification
        function showWelcomeNotification(firstName) {
            const notification = document.createElement('div');
            notification.className = 'fixed top-6 right-6 z-50 bg-gradient-to-r from-green-500 to-blue-500 text-white px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-500 translate-x-full';
            notification.innerHTML = `
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="font-semibold">Selamat datang, ${firstName}! 🎉</div>
                        <div class="text-sm opacity-90">Registrasi berhasil. Selamat menjelajahi!</div>
                    </div>
                </div>
            `;

            document.body.appendChild(notification);

            // Show notification
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Hide notification after 5 seconds (longer since we're staying on page)
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (document.body.contains(notification)) {
                        document.body.removeChild(notification);
                    }
                }, 500);
            }, 5000);
        }

        // Close modal when clicking outside
        const modalElement = document.getElementById('registrationModal');
        if (modalElement) {
            modalElement.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });
        }

        // Clear all visitor cookies (for testing)
        function clearVisitorCookies() {
            document.cookie = 'visitor_registered=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            document.cookie = 'visitor_name=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            document.cookie = 'visitor_school=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
            userRegistered = false;
            userData = {};
            updateUserInterface(false);
            console.log('Cookies cleared! Reload page to see auto-popup.');
        }

        // Initialize page when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM Content Loaded - Starting registration check');

            // Check registration status and show popup if needed
            checkUserRegistration();

            // Check if we should show popup from URL parameters or session (override auto popup)
            const urlParams = new URLSearchParams(window.location.search);
            const showPopup = urlParams.get('show_popup');
            const redirectTo = urlParams.get('redirect_to') || 'universities';

            // Check for session flash data (manual trigger)
            <?php if(session('show_popup') && session('redirect_to')): ?>
                console.log('Session flash data detected - showing popup');
                setTimeout(() => {
                    showRegistrationModal('<?php echo e(session("redirect_to")); ?>');
                }, 500);
            <?php elseif(isset($_GET['show_popup']) && $_GET['show_popup'] == '1'): ?>
                console.log('URL parameter detected - showing popup');
                setTimeout(() => {
                    showRegistrationModal('<?php echo e($_GET["redirect_to"] ?? "universities"); ?>');
                }, 500);
            <?php endif; ?>
        });

        // Add keyboard shortcut for testing (Ctrl+Shift+C to clear cookies)
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.shiftKey && e.key === 'C') {
                e.preventDefault();
                clearVisitorCookies();
                console.log('=== COOKIES CLEARED FOR TESTING ===');
                alert('Cookies cleared! Reload page to test auto-popup.');
            }
        });

        // Also add a global function for easy testing from console
        window.testAutoPopup = function() {
            console.log('=== TESTING AUTO POPUP ===');
            clearVisitorCookies();
            setTimeout(() => {
                checkUserRegistration();
            }, 500);
        };
    </script>
<?php $__env->stopPush(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\Coding\UDO\udo-platform\resources\views/homepage.blade.php ENDPATH**/ ?>