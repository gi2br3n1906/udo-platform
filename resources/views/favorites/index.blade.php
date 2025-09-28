<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Universitas Favorit - UDO Platform</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

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
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md border-b border-gray-100 fixed w-full z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <!-- Logo UDO -->
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">UDO</h1>
                        <p class="text-sm text-gray-500 -mt-1">University Discovery Orientation</p>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="flex items-center space-x-6">
                    <a href="{{ route('homepage') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                        Beranda
                    </a>
                                            <a href="{{ route('universities.index') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                            Universitas
                        </a>
                    <a href="{{ route('favorites.index') }}" class="text-blue-600 font-semibold">
                        Favorit
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-24 pb-12">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-red-500 to-pink-600 py-16">
            <div class="max-w-6xl mx-auto px-6 text-center text-white">
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full mb-6">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5 2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.04L12,21.35Z" />
                    </svg>
                    <span class="font-medium">Universitas Favorit</span>
                </div>

                <h1 class="text-4xl sm:text-5xl font-bold mb-4">
                    Universitas Favorit Anda
                </h1>

                <p class="text-xl text-red-100 mb-8">
                    Halo <strong>{{ $visitor->full_name }}</strong>, ini adalah daftar universitas yang telah Anda favoritkan
                </p>

                @if($favoriteUniversities->count() > 0)
                    <div class="bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full inline-block">
                        <span class="text-lg font-semibold">{{ $favoriteUniversities->total() }} Universitas Favorit</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Universities Grid -->
        <div class="max-w-6xl mx-auto px-6 -mt-8">
            @if($favoriteUniversities->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($favoriteUniversities as $university)
                        <div class="card-hover bg-white rounded-2xl overflow-hidden shadow-lg border border-gray-100">
                            <!-- University Image -->
                            <div class="h-48 bg-gradient-to-br from-blue-100 to-indigo-200 flex items-center justify-center">
                                @if($university->logo_path)
                                    <img src="{{ Storage::url($university->logo_path) }}"
                                         alt="{{ $university->name }}"
                                         class="w-20 h-20 object-contain">
                                @else
                                    <div class="w-20 h-20 bg-blue-600 rounded-xl flex items-center justify-center">
                                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- University Info -->
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-3">
                                    <h3 class="text-xl font-bold text-gray-900 line-clamp-2">{{ $university->name }}</h3>
                                    <button onclick="toggleFavorite({{ $university->id }})"
                                            class="favorite-btn favorite-btn-{{ $university->id }} ml-2 p-2 rounded-full bg-red-50 text-red-600 hover:bg-red-100 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5 2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.04L12,21.35Z" />
                                        </svg>
                                    </button>
                                </div>

                                <div class="flex items-center mb-4">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                                        {{ $university->type }}
                                    </span>
                                </div>

                                <div class="flex items-center text-gray-600 mb-4">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span class="text-sm">{{ $university->city }}</span>
                                </div>

                                @if($university->description)
                                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $university->description }}</p>
                                @endif

                                <a href="{{ route('universities.show', $university->slug) }}"
                                   class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                                    Lihat Detail
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($favoriteUniversities->hasPages())
                    <div class="mt-12">
                        {{ $favoriteUniversities->links() }}
                    </div>
                @endif
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Belum Ada Universitas Favorit</h3>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        Anda belum menambahkan universitas ke daftar favorit. Mulai eksplorasi dan temukan universitas impian Anda!
                    </p>
                    <a href="{{ route('universities.index') }}"
                       class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition-colors">
                        Jelajahi Universitas
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script>
        function toggleFavorite(universityId) {
            fetch('{{ route("favorites.toggle") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    university_id: universityId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    if (!data.is_favorited) {
                        // Remove from favorites - reload page to update the list
                        location.reload();
                    }

                    // Show feedback message
                    showNotification(data.message, data.is_favorited ? 'success' : 'info');
                } else {
                    showNotification('Terjadi kesalahan: ' + data.message, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Terjadi kesalahan saat memproses permintaan', 'error');
            });
        }

        function showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg text-white font-medium transform transition-all duration-300 translate-x-full`;

            // Set color based on type
            switch(type) {
                case 'success':
                    notification.classList.add('bg-green-500');
                    break;
                case 'error':
                    notification.classList.add('bg-red-500');
                    break;
                default:
                    notification.classList.add('bg-blue-500');
            }

            notification.textContent = message;
            document.body.appendChild(notification);

            // Show notification
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Hide notification after 3 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    </script>
</body>
</html>
