<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-lg shadow-xl overflow-hidden mb-8">
                <div class="px-6 py-12 text-center">
                    <h1 class="text-4xl font-bold text-white mb-4">
                        University Day's Out
                    </h1>
                    <p class="text-xl text-indigo-100 mb-8">
                        Platform interaktif untuk menjelajahi universitas terbaik Indonesia
                    </p>
                    <div class="flex justify-center space-x-4">
                        <a href="{{ route('universities.index') }}" class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition-colors">
                            Jelajahi Universitas
                        </a>
                        <a href="#" class="border-2 border-white text-white px-6 py-3 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition-colors">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Universities -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-indigo-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm">🎓</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Universitas</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $universityCount ?? 25 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PTN Count -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm">🏛️</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Perguruan Tinggi Negeri</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $ptnCount ?? 15 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PTS Count -->
                <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center">
                                    <span class="text-white text-sm">🏢</span>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Perguruan Tinggi Swasta</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $ptsCount ?? 10 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('universities.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-indigo-300 hover:bg-indigo-50 transition-colors">
                        <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                            <span class="text-indigo-600 text-lg">📚</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Lihat Universitas</p>
                            <p class="text-sm text-gray-500">Jelajahi semua universitas</p>
                        </div>
                    </a>

                    <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-green-300 hover:bg-green-50 transition-colors">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                            <span class="text-green-600 text-lg">❤️</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Universitas Favorit</p>
                            <p class="text-sm text-gray-500">Lihat pilihan favoritmu</p>
                        </div>
                    </a>

                    <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-purple-300 hover:bg-purple-50 transition-colors">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                            <span class="text-purple-600 text-lg">📊</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Statistik</p>
                            <p class="text-sm text-gray-500">Lihat data lengkap</p>
                        </div>
                    </a>

                    <a href="#" class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-yellow-300 hover:bg-yellow-50 transition-colors">
                        <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center mr-3">
                            <span class="text-yellow-600 text-lg">⚙️</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">Pengaturan</p>
                            <p class="text-sm text-gray-500">Kelola preferensi</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
