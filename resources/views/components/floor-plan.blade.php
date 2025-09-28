<!-- SVG Floor Plan Component -->
<div class="floor-plan-container bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-3 sm:p-6 shadow-lg">
    <!-- Floor Plan Header -->
    <div class="text-center mb-4 sm:mb-6">
        <h2 class="tex        </svg>

        <!-- Zoom Controls -->
        <div class="absolute bottom-4 right-4 flex flex-col space-y-2">
            <button id="zoomInBtn" class="w-10 h-10 sm:w-12 sm:h-12 bg-white hover:bg-gray-50 rounded-full shadow-lg border border-gray-200 flex items-center justify-center transition-colors">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </button>
            <button id="zoomOutBtn" class="w-10 h-10 sm:w-12 sm:h-12 bg-white hover:bg-gray-50 rounded-full shadow-lg border border-gray-200 flex items-center justify-center transition-colors">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                </svg>
            </button>
            <button id="zoomResetBtn" class="w-10 h-10 sm:w-12 sm:h-12 bg-white hover:bg-gray-50 rounded-full shadow-lg border border-gray-200 flex items-center justify-center transition-colors">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Interactive Stats -->
    <div class="mt-4 sm:mt-6 grid grid-cols-2 md:grid-cols-4 gap-2 sm:gap-4 text-center text-xs sm:text-sm">sm:text-2xl font-bold text-gray-800 mb-2">🗺️ Peta Lokasi Expo Universitas</h2>
        <p class="text-sm sm:text-base text-gray-600">
            <span class="hidden sm:inline">Klik booth universitas untuk melihat detail informasi</span>
            <span class="sm:hidden">Tap booth untuk detail info</span>
        </p>
    </div>

    <!-- Mobile Instructions -->
    <div class="block sm:hidden bg-blue-50 border border-blue-200 rounded-lg p-3 mb-4">
        <div class="flex items-center text-blue-700 text-sm">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Pinch to zoom, drag to pan, tap booth for info
        </div>
    </div>

    <!-- SVG Floor Plan -->
    <div class="relative bg-white rounded-xl shadow-md overflow-hidden touch-pan-x touch-pan-y">
        <svg
            id="floorPlanSVG"
            viewBox="0 0 800 600"
            class="w-full h-auto select-none"
            style="max-height: 70vh; min-height: 350px; touch-action: none;"
            xmlns="http://www.w3.org/2000/svg">

            <!-- Background -->
            <rect x="0" y="0" width="800" height="600" fill="#f8fafc" stroke="#e2e8f0" stroke-width="2"/>

            <!-- Main Hall Area -->
            <rect x="50" y="150" width="700" height="400" fill="#ffffff" stroke="#cbd5e1" stroke-width="2" rx="10"/>

            <!-- Stage Area -->
            <g id="stage-area">
                <!-- Stage Background -->
                <ellipse cx="400" cy="100" rx="200" ry="50" fill="#1e293b" stroke="#334155" stroke-width="3"/>
                <!-- Stage Label -->
                <text x="400" y="110" text-anchor="middle" class="text-white font-bold" fill="white" font-size="24" font-weight="bold">STAGE</text>
                <!-- Stage Decorations -->
                <circle cx="200" cy="100" r="8" fill="#334155"/>
                <circle cx="600" cy="100" r="8" fill="#334155"/>
                <rect x="190" y="80" width="4" height="40" fill="#334155"/>
                <rect x="606" y="80" width="4" height="40" fill="#334155"/>
            </g>

            <!-- Central Walkway -->
            <rect x="300" y="250" width="200" height="100" fill="#f1f5f9" stroke="#cbd5e1" stroke-width="1" stroke-dasharray="5,5" opacity="0.5"/>

            <!-- Left Side Booths -->
            <g id="left-booths">
                <!-- B19 -->
                @php $uph = $universities->where('booth_number', 'B19')->first(); @endphp
                <g class="booth-group" data-booth="B19" data-university-id="{{ $uph?->id }}">
                    <rect x="130" y="300" width="80" height="60" fill="#ffffff" stroke="#3b82f6" stroke-width="2" rx="8" class="booth-rect"/>
                    @if($uph)
                        <!-- University Logo -->
                        <image x="155" y="305" width="30" height="30" href="{{ $uph->logo_url ?: asset('images/universities/uph.svg') }}" class="logo-image"/>
                        <text x="170" y="345" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">{{ $uph->booth_number }}</text>
                        <text x="170" y="355" text-anchor="middle" fill="#64748b" font-size="8">{{ $uph->type }}</text>
                    @else
                        <circle cx="170" cy="320" r="15" fill="#4338ca" class="logo-placeholder"/>
                        <text x="170" y="325" text-anchor="middle" fill="white" font-size="12" font-weight="bold">UPH</text>
                        <text x="170" y="345" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B19</text>
                        <text x="170" y="355" text-anchor="middle" fill="#64748b" font-size="8">PTS</text>
                    @endif
                </g>

                <!-- B18 -->
                <g class="booth-group" data-booth="B18" data-university-id="{{ $universities->where('booth_number', 'B18')->first()?->id }}">
                    <rect x="230" y="300" width="80" height="60" fill="#ffffff" stroke="#0891b2" stroke-width="2" rx="8" class="booth-rect"/>
                    <circle cx="270" cy="320" r="15" fill="#0891b2" class="logo-placeholder"/>
                    <text x="270" y="325" text-anchor="middle" fill="white" font-size="12" font-weight="bold">BIN</text>
                    <text x="270" y="345" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B18</text>
                    <text x="270" y="355" text-anchor="middle" fill="#64748b" font-size="8">PTS</text>
                </g>

                <!-- B15 -->
                <g class="booth-group" data-booth="B15" data-university-id="{{ $universities->where('booth_number', 'B15')->first()?->id }}">
                    <rect x="130" y="460" width="80" height="60" fill="#ffffff" stroke="#dc2626" stroke-width="2" rx="8" class="booth-rect"/>
                    <circle cx="170" cy="480" r="15" fill="#dc2626" class="logo-placeholder"/>
                    <text x="170" y="485" text-anchor="middle" fill="white" font-size="12" font-weight="bold">TRI</text>
                    <text x="170" y="505" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B15</text>
                    <text x="170" y="515" text-anchor="middle" fill="#64748b" font-size="8">PTS</text>
                </g>
            </g>

            <!-- Center Booths (Premium Area) -->
            <g id="center-booths">
                <!-- B5 - UI -->
                <g class="booth-group" data-booth="B5" data-university-id="{{ $universities->where('booth_number', 'B5')->first()?->id }}">
                    <rect x="330" y="300" width="80" height="60" fill="#ffffff" stroke="#1e40af" stroke-width="3" rx="8" class="booth-rect premium"/>
                    <circle cx="370" cy="320" r="15" fill="#1e40af" class="logo-placeholder"/>
                    <text x="370" y="325" text-anchor="middle" fill="white" font-size="12" font-weight="bold">UI</text>
                    <text x="370" y="345" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B5</text>
                    <text x="370" y="355" text-anchor="middle" fill="#64748b" font-size="8">PTN</text>
                </g>

                <!-- B4 - ITB -->
                <g class="booth-group" data-booth="B4" data-university-id="{{ $universities->where('booth_number', 'B4')->first()?->id }}">
                    <rect x="430" y="300" width="80" height="60" fill="#ffffff" stroke="#dc2626" stroke-width="3" rx="8" class="booth-rect premium"/>
                    <circle cx="470" cy="320" r="15" fill="#dc2626" class="logo-placeholder"/>
                    <text x="470" y="325" text-anchor="middle" fill="white" font-size="12" font-weight="bold">ITB</text>
                    <text x="470" y="345" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B4</text>
                    <text x="470" y="355" text-anchor="middle" fill="#64748b" font-size="8">PTN</text>
                </g>

                <!-- B6 - UGM -->
                <g class="booth-group" data-booth="B6" data-university-id="{{ $universities->where('booth_number', 'B6')->first()?->id }}">
                    <rect x="330" y="380" width="80" height="60" fill="#ffffff" stroke="#059669" stroke-width="3" rx="8" class="booth-rect premium"/>
                    <circle cx="370" cy="400" r="15" fill="#059669" class="logo-placeholder"/>
                    <text x="370" y="405" text-anchor="middle" fill="white" font-size="12" font-weight="bold">UGM</text>
                    <text x="370" y="425" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B6</text>
                    <text x="370" y="435" text-anchor="middle" fill="#64748b" font-size="8">PTN</text>
                </g>

                <!-- B7 - IPB -->
                <g class="booth-group" data-booth="B7" data-university-id="{{ $universities->where('booth_number', 'B7')->first()?->id }}">
                    <rect x="430" y="380" width="80" height="60" fill="#ffffff" stroke="#7c3aed" stroke-width="3" rx="8" class="booth-rect premium"/>
                    <circle cx="470" cy="400" r="15" fill="#7c3aed" class="logo-placeholder"/>
                    <text x="470" y="405" text-anchor="middle" fill="white" font-size="12" font-weight="bold">IPB</text>
                    <text x="470" y="425" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B7</text>
                    <text x="470" y="435" text-anchor="middle" fill="#64748b" font-size="8">PTN</text>
                </g>

                <!-- B8 - UNAIR -->
                <g class="booth-group" data-booth="B8" data-university-id="{{ $universities->where('booth_number', 'B8')->first()?->id }}">
                    <rect x="330" y="460" width="80" height="60" fill="#ffffff" stroke="#ea580c" stroke-width="3" rx="8" class="booth-rect premium"/>
                    <circle cx="370" cy="480" r="15" fill="#ea580c" class="logo-placeholder"/>
                    <text x="370" y="485" text-anchor="middle" fill="white" font-size="11" font-weight="bold">UNAIR</text>
                    <text x="370" y="505" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B8</text>
                    <text x="370" y="515" text-anchor="middle" fill="#64748b" font-size="8">PTN</text>
                </g>

                <!-- B9 - UB -->
                <g class="booth-group" data-booth="B9" data-university-id="{{ $universities->where('booth_number', 'B9')->first()?->id }}">
                    <rect x="430" y="460" width="80" height="60" fill="#ffffff" stroke="#be185d" stroke-width="3" rx="8" class="booth-rect premium"/>
                    <circle cx="470" cy="480" r="15" fill="#be185d" class="logo-placeholder"/>
                    <text x="470" y="485" text-anchor="middle" fill="white" font-size="12" font-weight="bold">UB</text>
                    <text x="470" y="505" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B9</text>
                    <text x="470" y="515" text-anchor="middle" fill="#64748b" font-size="8">PTN</text>
                </g>
            </g>

            <!-- Right Side Booths -->
            <g id="right-booths">
                <!-- B1 - TELKOM -->
                <g class="booth-group" data-booth="B1" data-university-id="{{ $universities->where('booth_number', 'B1')->first()?->id }}">
                    <rect x="630" y="220" width="80" height="60" fill="#ffffff" stroke="#7c2d12" stroke-width="2" rx="8" class="booth-rect"/>
                    <circle cx="670" cy="240" r="15" fill="#7c2d12" class="logo-placeholder"/>
                    <text x="670" y="245" text-anchor="middle" fill="white" font-size="11" font-weight="bold">TELK</text>
                    <text x="670" y="265" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B1</text>
                    <text x="670" y="275" text-anchor="middle" fill="#64748b" font-size="8">PTS</text>
                </g>

                <!-- B2 - STAN -->
                <g class="booth-group" data-booth="B2" data-university-id="{{ $universities->where('booth_number', 'B2')->first()?->id }}">
                    <rect x="630" y="300" width="80" height="60" fill="#ffffff" stroke="#059669" stroke-width="2" rx="8" class="booth-rect"/>
                    <circle cx="670" cy="320" r="15" fill="#059669" class="logo-placeholder"/>
                    <text x="670" y="325" text-anchor="middle" fill="white" font-size="11" font-weight="bold">STAN</text>
                    <text x="670" y="345" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B2</text>
                    <text x="670" y="355" text-anchor="middle" fill="#64748b" font-size="8">KED</text>
                </g>

                <!-- B3 - UNDIP -->
                <g class="booth-group" data-booth="B3" data-university-id="{{ $universities->where('booth_number', 'B3')->first()?->id }}">
                    <rect x="630" y="380" width="80" height="60" fill="#ffffff" stroke="#1d4ed8" stroke-width="2" rx="8" class="booth-rect"/>
                    <circle cx="670" cy="400" r="15" fill="#1d4ed8" class="logo-placeholder"/>
                    <text x="670" y="405" text-anchor="middle" fill="white" font-size="11" font-weight="bold">UNDIP</text>
                    <text x="670" y="425" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">B3</text>
                    <text x="670" y="435" text-anchor="middle" fill="#64748b" font-size="8">PTN</text>
                </g>

                <!-- A1 - UNPAD -->
                <g class="booth-group" data-booth="A1" data-university-id="{{ $universities->where('booth_number', 'A1')->first()?->id }}">
                    <rect x="630" y="460" width="80" height="60" fill="#ffffff" stroke="#9333ea" stroke-width="2" rx="8" class="booth-rect"/>
                    <circle cx="670" cy="480" r="15" fill="#9333ea" class="logo-placeholder"/>
                    <text x="670" y="485" text-anchor="middle" fill="white" font-size="11" font-weight="bold">UNPAD</text>
                    <text x="670" y="505" text-anchor="middle" fill="#1e293b" font-size="10" font-weight="600">A1</text>
                    <text x="670" y="515" text-anchor="middle" fill="#64748b" font-size="8">PTN</text>
                </g>

                <!-- A2 - AKPOL -->
                <g class="booth-group" data-booth="A2" data-university-id="{{ $universities->where('booth_number', 'A2')->first()?->id }}">
                    <rect x="630" y="520" width="80" height="50" fill="#ffffff" stroke="#b91c1c" stroke-width="2" rx="8" class="booth-rect"/>
                    <circle cx="670" cy="540" r="12" fill="#b91c1c" class="logo-placeholder"/>
                    <text x="670" y="545" text-anchor="middle" fill="white" font-size="10" font-weight="bold">AKPOL</text>
                    <text x="670" y="560" text-anchor="middle" fill="#1e293b" font-size="9" font-weight="600">A2</text>
                </g>
            </g>

            <!-- Entrance Arrow -->
            <g id="entrance">
                <path d="M 400 580 L 380 560 L 390 560 L 390 540 L 410 540 L 410 560 L 420 560 Z" fill="#10b981" stroke="#047857" stroke-width="2"/>
                <text x="400" y="595" text-anchor="middle" fill="#047857" font-size="12" font-weight="bold">ENTRANCE</text>
            </g>

            <!-- Legend -->
            <g id="legend" transform="translate(50, 50)">
                <rect x="0" y="0" width="150" height="80" fill="white" stroke="#e2e8f0" stroke-width="1" rx="8" opacity="0.95"/>
                <text x="10" y="15" fill="#1e293b" font-size="12" font-weight="bold">Legend:</text>
                <circle cx="20" cy="30" r="6" fill="#1e40af"/>
                <text x="35" y="35" fill="#374151" font-size="10">PTN</text>
                <circle cx="20" cy="45" r="6" fill="#0891b2"/>
                <text x="35" y="50" fill="#374151" font-size="10">PTS</text>
                <circle cx="20" cy="60" r="6" fill="#059669"/>
                <text x="35" y="65" fill="#374151" font-size="10">Kedinasan</text>
            </g>

            <!-- Navigation Info -->
            <text x="400" y="30" text-anchor="middle" fill="#64748b" font-size="14" font-weight="600">🎓 Expo Universitas 2025 | Klik booth untuk detail info</text>

            <!-- Hover Tooltip (will be shown/hidden via JavaScript) -->
            <g id="tooltip" style="display: none; pointer-events: none;">
                <rect x="0" y="0" width="200" height="60" fill="#1f2937" stroke="#374151" stroke-width="1" rx="8" opacity="0.95"/>
                <text id="tooltip-title" x="10" y="20" fill="white" font-size="12" font-weight="bold"></text>
                <text id="tooltip-type" x="10" y="35" fill="#9ca3af" font-size="10"></text>
                <text id="tooltip-booth" x="10" y="50" fill="#60a5fa" font-size="10"></text>
            </g>
        </svg>

        <!-- Zoom Controls -->
        <div class="absolute top-4 right-4 flex flex-col space-y-2">
            <button id="zoomIn" class="bg-white hover:bg-gray-50 text-gray-700 p-2 rounded-lg shadow-md border transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </button>
            <button id="zoomOut" class="bg-white hover:bg-gray-50 text-gray-700 p-2 rounded-lg shadow-md border transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"></path>
                </svg>
            </button>
            <button id="resetZoom" class="bg-white hover:bg-gray-50 text-gray-700 p-2 rounded-lg shadow-md border transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Interactive Stats -->
    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
        <div class="bg-blue-50 rounded-lg p-3">
            <div class="text-2xl font-bold text-blue-600">{{ $universities->where('type', 'PTN')->count() }}</div>
            <div class="text-sm text-blue-800">PTN</div>
        </div>
        <div class="bg-cyan-50 rounded-lg p-3">
            <div class="text-2xl font-bold text-cyan-600">{{ $universities->where('type', 'PTS')->count() }}</div>
            <div class="text-sm text-cyan-800">PTS</div>
        </div>
        <div class="bg-emerald-50 rounded-lg p-3">
            <div class="text-2xl font-bold text-emerald-600">{{ $universities->where('type', 'Kedinasan')->count() }}</div>
            <div class="text-sm text-emerald-800">Kedinasan</div>
        </div>
        <div class="bg-purple-50 rounded-lg p-3">
            <div class="text-2xl font-bold text-purple-600">{{ $universities->count() }}</div>
            <div class="text-sm text-purple-800">Total</div>
        </div>
    </div>
</div>

<style>
    .booth-group {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .booth-group:hover {
        transform: scale(1.05);
    }

    .booth-group:hover .booth-rect {
        filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.15));
    }

    .booth-group:hover .logo-placeholder {
        filter: brightness(1.1);
    }

    .premium {
        filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
    }

    .booth-group.highlighted {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.08); }
    }

    /* Mobile optimizations */
    @media (max-width: 640px) {
        .booth-group {
            cursor: pointer;
        }
        
        .booth-group:active {
            transform: scale(0.95);
        }
        
        /* Increase touch target size on mobile */
        .booth-rect {
            stroke-width: 3;
        }
        
        /* Better visibility on small screens */
        #tooltip {
            font-size: 12px;
        }
    }

    /* Touch device optimizations */
    @media (pointer: coarse) {
        .booth-group:hover {
            transform: none;
        }
        
        .booth-group:active {
            transform: scale(0.95);
        }
    }
</style>
