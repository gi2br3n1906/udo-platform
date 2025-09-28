<x-app-layout>
    @push('styles')
    <style>
        /* Critical CSS - Inline for faster rendering */
        .critical-content { visibility: visible; }

        /* Optimize image loading */
        img { content-visibility: auto; }

        /* Reduce layout shifts */
        .aspect-square { aspect-ratio: 1; }

        /* Optimize animations */
        * { transition-duration: 0.2s; }
    </style>
    @endpush
    <!-- Main Content with Modern Background -->
    <div class="py-6 bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900 min-h-screen relative">
        <!-- Background Pattern - Fixed to not interfere with navbar -->
        <div class="absolute inset-0 opacity-10 -z-10 pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-500 rounded-full"></div>
            <div class="absolute top-3/4 right-1/4 w-64 h-64 bg-purple-500 rounded-full"></div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-500 rounded-full"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Welcome Section -->
            <div class="mb-8">
                @if($visitor)
                    <div class="bg-gradient-to-r from-emerald-500 to-blue-500 rounded-xl p-6 text-white shadow-2xl border border-white/20">
                        <div class="flex items-start space-x-3 mb-3">
                            <div class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-xl">👋</span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h2 class="text-xl font-semibold mb-1 critical-content">
                                    Selamat Datang, {{ $visitor->full_name }}!
                                </h2>
                                <p class="text-blue-100 text-sm">
                                    Temukan universitas impianmu dari {{ $universities->count() }} pilihan universitas terbaik
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6">
                            <div class="bg-white/20 backdrop-blur-lg rounded-xl p-4 text-center border border-white/30 hover:bg-white/30 transition-all duration-300">
                                <div class="text-2xl font-bold text-yellow-400">{{ $universities->count() }}</div>
                                <div class="text-sm text-white">Universitas</div>
                            </div>
                            @if($visitor->favoriteUniversities->count() > 0)
                            <div class="bg-white/20 backdrop-blur-lg rounded-xl p-4 text-center border border-white/30 hover:bg-white/30 transition-all duration-300">
                                <div class="text-2xl font-bold text-pink-400">{{ $visitor->favoriteUniversities->count() }}</div>
                                <div class="text-sm text-white">Favorit</div>
                            </div>
                            @endif
                            <div class="bg-white/20 backdrop-blur-lg rounded-xl p-4 text-center border border-white/30 hover:bg-white/30 transition-all duration-300">
                                <div class="text-2xl font-bold text-emerald-400">{{ $universities->where('type', 'PTN')->count() }}</div>
                                <div class="text-sm text-white">PTN</div>
                            </div>
                            <div class="bg-white/20 backdrop-blur-lg rounded-xl p-4 text-center border border-white/30 hover:bg-white/30 transition-all duration-300">
                                <div class="text-2xl font-bold text-purple-400">{{ $universities->where('type', 'PTS')->count() }}</div>
                                <div class="text-sm text-white">PTS</div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-xl p-6 shadow-2xl">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                                <span class="text-2xl text-white">🎓</span>
                            </div>
                            <h2 class="text-2xl font-bold text-white mb-3 critical-content">
                                Jelajahi Universitas Pilihan
                            </h2>
                            <p class="text-gray-300 text-lg">
                                Temukan universitas terbaik yang sesuai dengan minat dan bakatmu dari <span class="text-yellow-400 font-semibold">{{ $universities->count() }} pilihan universitas</span>
                            </p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="mb-8 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                            <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="text-white font-semibold text-lg">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Search & Filter Section -->
            <div class="search-filter-container mb-8 space-y-6">
                <!-- Search Bar -->
                <div class="relative max-w-2xl mx-auto">
                    <input type="text"
                           id="universitySearch"
                           placeholder="Cari universitas..."
                           class="w-full pl-12 pr-12 py-4 bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400 text-white placeholder-gray-300 text-lg shadow-xl">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-6 w-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <button id="clearSearch" class="absolute inset-y-0 right-0 pr-4 flex items-center hidden">
                        <svg class="h-5 w-5 text-gray-300 hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>                <!-- Filter Buttons -->
                <div class="flex flex-wrap gap-3 justify-center">
                    <button id="filterAll" class="filter-btn active px-6 py-3 text-lg font-semibold rounded-2xl bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300">
                        Semua ({{ $universities->count() }})
                    </button>
                    <button id="filterPTN" class="filter-btn px-6 py-3 text-lg font-semibold rounded-2xl bg-white/10 backdrop-blur-lg text-white border border-white/20 shadow-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-green-500 hover:text-white transform hover:scale-105 transition-all duration-300">
                        PTN ({{ $universities->where('type', 'PTN')->count() }})
                    </button>
                    <button id="filterPTS" class="filter-btn px-6 py-3 text-lg font-semibold rounded-2xl bg-white/10 backdrop-blur-lg text-white border border-white/20 shadow-xl hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-500 hover:text-white transform hover:scale-105 transition-all duration-300">
                        PTS ({{ $universities->where('type', 'PTS')->count() }})
                    </button>
                    <button id="filterSaintek" class="filter-btn px-6 py-3 text-lg font-semibold rounded-2xl bg-white/10 backdrop-blur-lg text-white border border-white/20 shadow-xl hover:bg-gradient-to-r hover:from-orange-500 hover:to-red-500 hover:text-white transform hover:scale-105 transition-all duration-300">
                        Saintek ({{ $universities->where('category', 'Saintek')->count() }})
                    </button>
                    <button id="filterSoshum" class="filter-btn px-6 py-3 text-lg font-semibold rounded-2xl bg-white/10 backdrop-blur-lg text-white border border-white/20 shadow-xl hover:bg-gradient-to-r hover:from-pink-500 hover:to-purple-500 hover:text-white transform hover:scale-105 transition-all duration-300">
                        Soshum ({{ $universities->where('category', 'Soshum')->count() }})
                    </button>
                </div>
            </div>

            <!-- View Toggle Buttons -->
            <div class="mb-6 flex justify-center">
                <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-1 inline-flex shadow-xl">
                    <button id="mapViewBtn" class="px-6 py-3 text-lg font-medium bg-gradient-to-r from-cyan-400 to-blue-500 text-white rounded-xl shadow-lg">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                        </svg>
                        Peta
                    </button>
                    <button id="listViewBtn" class="px-6 py-3 text-lg font-medium text-white hover:bg-white/10 rounded-xl transition-all duration-300">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        List
                    </button>
                </div>
            </div>

            <!-- Floor Plan View -->
            <div id="mapView" class="mb-6">
                <div class="loading-placeholder" style="min-height: 400px;">
                    <x-expo-floor-plan />
                </div>
            </div>

            <!-- List View -->
            <div id="listView" class="hidden">
                <!-- Universities Grid -->
            @if($universities->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($universities as $university)
                        <div class="bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl shadow-xl hover:shadow-2xl hover:bg-white/20 transition-all duration-300 group transform hover:scale-105">
                            <a href="{{ route('universities.show', $university->slug) }}" class="block">
                                <!-- University Logo -->
                                <div class="aspect-square w-full bg-white/10 backdrop-blur-lg rounded-t-2xl flex items-center justify-center p-6 border-b border-white/20">
                                    @if($university->logo_url)
                                        <img src="{{ $university->logo_url }}"
                                             alt="{{ $university->name }}"
                                             loading="lazy"
                                             class="w-20 h-20 object-contain group-hover:scale-110 transition-transform duration-300">
                                    @else
                                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                            <span class="text-white text-2xl font-bold">
                                                {{ strtoupper(substr($university->name, 0, 1)) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- University Info -->
                                <div class="p-6">
                                    <h3 class="font-bold text-white mb-3 group-hover:text-yellow-400 transition-colors line-clamp-2 text-lg">
                                        {{ $university->name }}
                                    </h3>

                                    <!-- Type and Category Badges -->
                                    <div class="flex flex-wrap gap-1 mb-3">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                            @if($university->type === 'PTN') bg-green-100 text-green-800
                                            @elseif($university->type === 'PTS') bg-blue-100 text-blue-800
                                            @else bg-purple-100 text-purple-800 @endif">
                                            {{ $university->type }}
                                        </span>
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                            @if($university->category === 'Saintek') bg-orange-100 text-orange-800
                                            @elseif($university->category === 'Soshum') bg-pink-100 text-pink-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ $university->category }}
                                        </span>
                                    </div>

                                    <!-- Description Preview -->
                                    @if($university->description)
                                        <p class="text-gray-300 text-sm line-clamp-2 mb-4 leading-relaxed">
                                            {{ Str::limit($university->description, 80) }}
                                        </p>
                                    @endif

                                    <!-- Favorite Status -->
                                    @if($visitor && $visitor->hasFavorited($university))
                                        <div class="flex items-center text-pink-400 text-sm font-medium">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path>
                                            </svg>
                                            Difavoritkan ❤️
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2-2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada universitas</h3>
                    <p class="mt-1 text-sm text-gray-500">Data universitas akan segera tersedia.</p>
                </div>
            @endif
    </div>
    <!-- End List View -->
        </div>
    </main>

    <!-- University Detail Modal -->
    <div id="universityModal" class="fixed inset-0 z-50 hidden">
        <!-- Modal Backdrop -->
        <div class="absolute inset-0 bg-black bg-opacity-50" onclick="closeUniversityModal()"></div>

        <!-- Modal Content -->
        <div class="relative flex items-center justify-center min-h-full p-4">
            <div class="relative bg-white rounded-2xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
                <!-- Modal Header -->
                <div class="bg-blue-600 px-6 py-4 text-white">
                    <div class="flex items-center justify-between">
                        <h2 id="modalTitle" class="text-xl font-bold">University Details</h2>
                        <button onclick="closeUniversityModal()" class="text-white hover:text-gray-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6 overflow-y-auto max-h-[70vh]">
                    <div class="flex items-start space-x-4 mb-4">
                        <!-- University Logo -->
                        <div class="w-16 h-16 bg-gray-50 rounded-xl flex items-center justify-center p-2 flex-shrink-0">
                            <img id="modalLogo" src="" alt="" class="w-full h-full object-contain" loading="lazy">
                        </div>

                        <!-- University Info -->
                        <div class="flex-1">
                            <h3 id="modalUniversityName" class="text-lg font-bold text-gray-900 mb-2"></h3>
                            <div class="flex flex-wrap gap-1 mb-2">
                                <span id="modalType" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800"></span>
                                <span id="modalCategory" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-800"></span>
                                <span id="modalBooth" class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <h4 class="text-sm font-semibold text-gray-700 mb-2">Deskripsi</h4>
                        <p id="modalDescription" class="text-gray-600 text-sm leading-relaxed"></p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button id="favoriteBtn" onclick="toggleFavorite()" class="flex-1 bg-red-50 text-red-600 hover:bg-red-100 border border-red-200 rounded-lg px-4 py-3 text-sm font-medium transition-colors flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path>
                            </svg>
                            <span id="favoriteText">Add to Favorites</span>
                        </button>

                        <a id="detailBtn" href="#" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-3 text-sm font-medium transition-colors flex items-center justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    @push('scripts')
    <script>
        let currentUniversityId = null;
        let universitiesData = @json($universities->keyBy('id'));
        let currentFilter = 'all';
        let currentSearchTerm = '';

        document.addEventListener('DOMContentLoaded', function() {
            initializeSearchAndFilter();
            const mapViewBtn = document.getElementById('mapViewBtn');
            const listViewBtn = document.getElementById('listViewBtn');
            const mapView = document.getElementById('mapView');
            const listView = document.getElementById('listView');

            // Toggle to Map View
            mapViewBtn.addEventListener('click', function() {
                mapView.classList.remove('hidden');
                listView.classList.add('hidden');

                // Update button styles
                mapViewBtn.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
                mapViewBtn.classList.remove('text-gray-600', 'hover:text-gray-900');

                listViewBtn.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
                listViewBtn.classList.add('text-gray-600', 'hover:text-gray-900');
            });

            // Toggle to List View
            listViewBtn.addEventListener('click', function() {
                listView.classList.remove('hidden');
                mapView.classList.add('hidden');

                // Update button styles
                listViewBtn.classList.add('bg-white', 'text-blue-600', 'shadow-sm');
                listViewBtn.classList.remove('text-gray-600', 'hover:text-gray-900');

                mapViewBtn.classList.remove('bg-white', 'text-blue-600', 'shadow-sm');
                mapViewBtn.classList.add('text-gray-600', 'hover:text-gray-900');
            });
        });

        // Search & Filter Functions
        function initializeSearchAndFilter() {
            const searchInput = document.getElementById('universitySearch');
            const clearSearchBtn = document.getElementById('clearSearch');
            const filterButtons = document.querySelectorAll('.filter-btn');

            // Search functionality
            searchInput.addEventListener('input', function(e) {
                currentSearchTerm = e.target.value.toLowerCase().trim();

                // Show/hide clear button
                if (currentSearchTerm) {
                    clearSearchBtn.classList.remove('hidden');
                } else {
                    clearSearchBtn.classList.add('hidden');
                }

                applySearchAndFilter();
            });

            // Clear search
            clearSearchBtn.addEventListener('click', function() {
                searchInput.value = '';
                currentSearchTerm = '';
                clearSearchBtn.classList.add('hidden');
                applySearchAndFilter();
            });

            // Filter functionality
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    filterButtons.forEach(btn => {
                        btn.classList.remove('active', 'bg-blue-600', 'text-white');
                        btn.classList.add('bg-white', 'text-gray-700', 'border', 'border-gray-300');
                    });

                    // Add active class to clicked button
                    this.classList.add('active', 'bg-blue-600', 'text-white');
                    this.classList.remove('bg-white', 'text-gray-700', 'border', 'border-gray-300');

                    // Set current filter
                    currentFilter = this.id.replace('filter', '').toLowerCase();
                    applySearchAndFilter();
                });
            });
        }

        function applySearchAndFilter() {
            // Apply to floor plan
            if (window.floorPlan && window.floorPlan.highlightBooths) {
                window.floorPlan.highlightBooths(currentSearchTerm, currentFilter);
            }

            // Apply to list view and get count
            const visibleCount = applyListViewFilter();

            // Update search result info
            updateSearchResultInfo(visibleCount);
        }

        function applyListViewFilter() {
            const universityCards = document.querySelectorAll('#listView .group');
            let visibleCount = 0;

            universityCards.forEach(card => {
                const universityLink = card.querySelector('a');
                const slug = universityLink ? universityLink.href.split('/').pop() : '';
                const university = Object.values(universitiesData).find(u => u.slug === slug);

                if (!university) {
                    card.style.display = 'none';
                    return;
                }

                let matchesSearch = true;
                let matchesFilter = true;

                // Search filter
                if (currentSearchTerm) {
                    const searchableText = (
                        university.name + ' ' +
                        university.booth_number + ' ' +
                        university.type + ' ' +
                        university.category
                    ).toLowerCase();
                    matchesSearch = searchableText.includes(currentSearchTerm);
                }

                // Type/Category filter
                if (currentFilter !== 'all') {
                    switch (currentFilter) {
                        case 'ptn':
                            matchesFilter = university.type === 'PTN';
                            break;
                        case 'pts':
                            matchesFilter = university.type === 'PTS';
                            break;
                        case 'saintek':
                            matchesFilter = university.category === 'Saintek';
                            break;
                        case 'soshum':
                            matchesFilter = university.category === 'Soshum';
                            break;
                    }
                }

                // Show/hide card
                if (matchesSearch && matchesFilter) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Update empty state
            updateListViewEmptyState(visibleCount);

            return visibleCount;
        }

        function updateListViewEmptyState(visibleCount) {
            const listView = document.getElementById('listView');
            let emptyState = listView.querySelector('.empty-state');

            if (visibleCount === 0) {
                if (!emptyState) {
                    emptyState = document.createElement('div');
                    emptyState.className = 'empty-state text-center py-12';
                    emptyState.innerHTML = `
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada universitas ditemukan</h3>
                        <p class="mt-1 text-sm text-gray-500">Coba ubah kata kunci pencarian atau filter.</p>
                    `;
                    listView.appendChild(emptyState);
                }
            } else if (emptyState) {
                emptyState.remove();
            }
        }

        function updateSearchResultInfo(visibleCount) {
            // Add or update search result info
            let searchInfo = document.getElementById('searchResultInfo');

            if (currentSearchTerm || currentFilter !== 'all') {
                if (!searchInfo) {
                    searchInfo = document.createElement('div');
                    searchInfo.id = 'searchResultInfo';
                    searchInfo.className = 'mb-4 text-sm text-gray-600';

                    // Insert after search bar
                    const searchContainer = document.querySelector('.search-filter-container');
                    searchContainer.parentNode.insertBefore(searchInfo, searchContainer.nextSibling);
                }

                let infoText = '';
                if (currentSearchTerm && currentFilter !== 'all') {
                    infoText = `Menampilkan ${visibleCount} universitas untuk "${currentSearchTerm}" dengan filter ${getFilterLabel(currentFilter)}`;
                } else if (currentSearchTerm) {
                    infoText = `Menampilkan ${visibleCount} universitas untuk "${currentSearchTerm}"`;
                } else if (currentFilter !== 'all') {
                    infoText = `Menampilkan ${visibleCount} universitas ${getFilterLabel(currentFilter)}`;
                }

                searchInfo.textContent = infoText;
            } else if (searchInfo) {
                searchInfo.remove();
            }
        }

        function getFilterLabel(filter) {
            const labels = {
                'ptn': 'PTN',
                'pts': 'PTS',
                'saintek': 'Saintek',
                'soshum': 'Soshum'
            };
            return labels[filter] || filter;
        }

        // University Modal Functions - Make global for floor-plan.js
        window.showUniversityModal = function(universityId) {
            if (!universityId) return;

            currentUniversityId = universityId;

            // Fetch university data
            fetch(`/api/universities/${universityId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        populateModal(data.university);
                        document.getElementById('universityModal').classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    }
                })
                .catch(error => {
                    console.error('Error fetching university data:', error);
                });
        }

        function populateModal(university) {
            document.getElementById('modalTitle').textContent = university.name;
            document.getElementById('modalUniversityName').textContent = university.name;
            document.getElementById('modalType').textContent = university.type;
            document.getElementById('modalCategory').textContent = university.category;
            document.getElementById('modalBooth').textContent = 'Booth ' + university.booth_number;
            document.getElementById('modalDescription').textContent = university.description || 'Deskripsi tidak tersedia.';

            // Set logo
            const modalLogo = document.getElementById('modalLogo');
            modalLogo.src = university.logo_url || '/images/universities/default.svg';
            modalLogo.alt = university.name;

            // Set detail link
            document.getElementById('detailBtn').href = `/universitas/${university.slug}`;

            // Set favorite button
            updateFavoriteButton(university.is_favorited);
        }

        function updateFavoriteButton(isFavorited) {
            const favoriteBtn = document.getElementById('favoriteBtn');
            const favoriteText = document.getElementById('favoriteText');

            if (isFavorited) {
                favoriteBtn.className = 'flex-1 bg-red-100 text-red-700 border border-red-300 rounded-lg px-4 py-2 font-medium transition-colors flex items-center justify-center';
                favoriteText.textContent = 'Remove from Favorites';
            } else {
                favoriteBtn.className = 'flex-1 bg-red-50 text-red-600 hover:bg-red-100 border border-red-200 rounded-lg px-4 py-2 font-medium transition-colors flex items-center justify-center';
                favoriteText.textContent = 'Add to Favorites';
            }
        }

        function closeUniversityModal() {
            document.getElementById('universityModal').classList.add('hidden');
            document.body.style.overflow = '';
            currentUniversityId = null;
        }

        function toggleFavorite() {
            if (!currentUniversityId) return;

            fetch(`/universitas/${currentUniversityId}/toggle-favorite`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateFavoriteButton(data.is_favorited);
                }
            })
            .catch(error => {
                console.error('Error toggling favorite:', error);
            });
        }

        // ESC key to close modal
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeUniversityModal();
            }
        });
    </script>
    @endpush
</x-app-layout>
