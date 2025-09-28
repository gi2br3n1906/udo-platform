<x-app-layout>
    @push('title', $university->name . ' - UDO Platform')

    <!-- University Detail Page -->
    <div class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] -z-10 pointer-events-none"></div>

        <!-- Main Content -->
        <div class="relative z-10 py-8">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Back Button -->
                <div class="mb-8">
                    <a href="{{ route('universities.index') }}"
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white/80 hover:text-white bg-white/10 backdrop-blur-lg border border-white/20 rounded-lg hover:bg-white/20 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                        Kembali ke Universitas
                    </a>
                </div>
                <!-- University Header -->
                <div class="bg-white/10 backdrop-blur-xl rounded-3xl border border-white/20 overflow-hidden mb-8 shadow-2xl">
                    <div class="bg-gradient-to-r from-purple-600/30 to-blue-600/30 backdrop-blur-lg px-8 py-8">
                        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                                <!-- University Logo -->
                                <div class="w-24 h-24 bg-white/20 backdrop-blur-lg rounded-2xl border border-white/30 flex items-center justify-center p-4">
                                    @if($university->logo_url)
                                        <img src="{{ $university->logo_url }}"
                                             alt="{{ $university->name }}"
                                             class="w-full h-full object-contain">
                                    @else
                                        <div class="w-full h-full bg-gradient-to-br from-white/30 to-white/10 rounded-xl flex items-center justify-center">
                                            <span class="text-white text-2xl font-bold">
                                                {{ strtoupper(substr($university->name, 0, 1)) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- University Info -->
                                <div>
                                    <h1 class="text-3xl font-bold text-white mb-3">{{ $university->name }}</h1>
                                    <div class="flex flex-wrap gap-3">
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-white/20 backdrop-blur-lg border border-white/30 text-white">
                                            {{ $university->type }}
                                        </span>
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-white/20 backdrop-blur-lg border border-white/30 text-white">
                                            {{ $university->category }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Favorite Button -->
                            @if($visitor)
                            <div class="flex justify-start lg:justify-end">
                                <form method="POST" action="{{ route('universities.toggle-favorite', $university->slug) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="flex items-center px-6 py-3 rounded-xl font-medium transition-all duration-200 backdrop-blur-lg border
                                        @if($hasFavorited)
                                            bg-red-500/20 border-red-400/30 text-red-200 hover:bg-red-500/30
                                        @else
                                            bg-white/10 border-white/30 text-white hover:bg-white/20
                                        @endif">
                                        <svg class="w-5 h-5 mr-2 @if($hasFavorited) fill-current @else stroke-current @endif" viewBox="0 0 20 20">
                                            <path @if($hasFavorited)
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                @else
                                                fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                                                @endif>
                                        </svg>
                                        @if($hasFavorited) Hapus Favorit @else Tambah Favorit @endif
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="mb-8 bg-green-500/20 backdrop-blur-lg border border-green-400/30 rounded-xl p-4">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-green-300 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm font-medium text-green-100">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <!-- University Details -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Description -->
                        @if($university->description)
                        <div class="bg-white/10 backdrop-blur-xl rounded-2xl border border-white/20 p-8 shadow-xl">
                            <h2 class="text-2xl font-semibold text-white mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Tentang Universitas
                            </h2>
                            <div class="prose prose-lg max-w-none">
                                <p class="text-white/80 leading-relaxed text-lg">{{ $university->description }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Social Media -->
                        @if($university->social_media && count($university->social_media) > 0)
                        <div class="bg-white/10 backdrop-blur-xl rounded-2xl border border-white/20 p-8 shadow-xl">
                            <h2 class="text-2xl font-semibold text-white mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0V2a1 1 0 011-1h8a1 1 0 011 1v2"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14l-1 10H6L5 7z"></path>
                                </svg>
                                Media Sosial
                            </h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach($university->social_media as $platform => $url)
                                    @if($url)
                                    <a href="{{ $url }}" target="_blank"
                                       class="flex items-center p-4 rounded-xl bg-white/5 border border-white/10 hover:border-white/30 hover:bg-white/10 transition-all duration-200 group">
                                        <div class="w-12 h-12 rounded-lg bg-white/10 backdrop-blur-lg flex items-center justify-center mr-4 group-hover:bg-white/20">
                                            @if(strtolower($platform) === 'instagram')
                                                <svg class="w-6 h-6 text-pink-400" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12.017 0C8.396 0 7.999.01 6.756.048 5.517.087 4.668.222 3.935.42 3.176.624 2.534.898 1.893 1.539.898 2.534.624 3.176.42 3.935.222 4.668.087 5.517.048 6.756.01 7.999 0 8.396 0 12.017c0 3.624.01 4.021.048 5.264.039 1.239.174 2.088.372 2.821.204.739.478 1.381 1.119 2.022.641.641 1.283.915 2.022 1.119.733.198 1.582.333 2.821.372C7.999 23.99 8.396 24 12.017 24s4.021-.01 5.264-.048c1.239-.039 2.088-.174 2.821-.372.739-.204 1.381-.478 2.022-1.119.641-.641.915-1.283 1.119-2.022.198-.733.333-1.582.372-2.821C23.99 16.021 24 15.624 24 12.017s-.01-4.021-.048-5.264c-.039-1.239-.174-2.088-.372-2.821-.204-.739-.478-1.381-1.119-2.022C21.82 1.269 21.178.995 20.439.791c-.733-.198-1.582-.333-2.821-.372C16.021.01 15.624 0 12.017 0zM12.017 2.162c3.557 0 3.978.01 5.38.048 1.299.059 2.006.277 2.476.459.622.242 1.067.531 1.535.999.468.468.757.913.999 1.535.182.47.4 1.177.459 2.476.039 1.402.048 1.823.048 5.38s-.01 3.978-.048 5.38c-.059 1.299-.277 2.006-.459 2.476-.242.622-.531 1.067-.999 1.535-.468.468-.913.757-1.535.999-.47.182-1.177.4-2.476.459-1.402.039-1.823.048-5.38.048s-3.978-.01-5.38-.048c-1.299-.059-2.006-.277-2.476-.459-.622-.242-1.067-.531-1.535-.999-.468-.468-.757-.913-.999-1.535-.182-.47-.4-1.177-.459-2.476C2.172 15.995 2.162 15.574 2.162 12.017s.01-3.978.048-5.38c.059-1.299.277-2.006.459-2.476.242-.622.531-1.067.999-1.535.468-.468.913-.757 1.535-.999.47-.182 1.177-.4 2.476-.459 1.402-.039 1.823-.048 5.38-.048z"/>
                                                    <path d="M12.017 5.838a6.179 6.179 0 100 12.358 6.179 6.179 0 000-12.358zM12.017 16a3.841 3.841 0 110-7.682 3.841 3.841 0 010 7.682z"/>
                                                    <circle cx="18.406" cy="5.594" r="1.44"/>
                                                </svg>
                                            @elseif(strtolower($platform) === 'tiktok')
                                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-.88-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                                                </svg>
                                            @else
                                                <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                                </svg>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="font-medium text-white capitalize">{{ $platform }}</p>
                                            <p class="text-sm text-white/60">Kunjungi halaman</p>
                                        </div>
                                    </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Quick Info -->
                        <div class="bg-white/10 backdrop-blur-xl rounded-2xl border border-white/20 p-8 shadow-xl">
                            <h3 class="text-xl font-semibold text-white mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Informasi Universitas
                            </h3>
                            <div class="space-y-6">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-blue-500/20 backdrop-blur-lg rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-white/70">Jenis</p>
                                        <p class="text-lg font-semibold text-white">{{ $university->type }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-green-500/20 backdrop-blur-lg rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-white/70">Kategori</p>
                                        <p class="text-lg font-semibold text-white">{{ $university->category }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Official Website -->
                        @if($university->official_link)
                        <div class="bg-white/10 backdrop-blur-xl rounded-2xl border border-white/20 p-8 shadow-xl">
                            <h3 class="text-xl font-semibold text-white mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                                </svg>
                                Website Resmi
                            </h3>
                            <a href="{{ $university->official_link }}" target="_blank"
                               class="flex items-center justify-center w-full px-6 py-4 bg-gradient-to-r from-blue-500/30 to-purple-600/30 backdrop-blur-lg border border-blue-400/30 text-white rounded-xl hover:from-blue-500/40 hover:to-purple-600/40 hover:border-blue-300/40 transition-all duration-200 group">
                                <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                Kunjungi Website Resmi
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
