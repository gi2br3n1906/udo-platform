<!-- Simplified SVG Floor Plan Component -->
<div class="floor-plan-container bg-white rounded-2xl shadow-lg overflow-hidden">
    <!-- Floor Plan Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-4 text-center">
        <h2 class="text-lg sm:text-xl font-bold mb-1">🗺️ Peta Lokasi Expo</h2>
        <p class="text-sm opacity-90">Klik booth untuk detail universitas</p>
    </div>

    <!-- SVG Container -->
    <div class="relative bg-gray-50 p-4">
        <svg
            id="floorPlanSVG"
            viewBox="0 0 800 500"
            class="w-full h-auto max-h-[60vh] border border-gray-200 rounded-lg bg-white"
            xmlns="http://www.w3.org/2000/svg">

            <!-- Background Grid -->
            <defs>
                <pattern id="grid" width="50" height="50" patternUnits="userSpaceOnUse">
                    <path d="M 50 0 L 0 0 0 50" fill="none" stroke="#f1f5f9" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />

            <!-- Stage Area -->
            <rect x="250" y="50" width="300" height="80" fill="#1e293b" stroke="#334155" stroke-width="2" rx="10"/>
            <text x="400" y="100" text-anchor="middle" fill="white" font-size="20" font-weight="bold">STAGE</text>

            <!-- Booth Areas - Simplified Grid Layout -->
            @php $xStart = 150; $yStart = 200; $boothWidth = 80; $boothHeight = 60; $spacing = 20; @endphp

            @foreach($universities as $index => $university)
                @php
                    $row = floor($index / 6);
                    $col = $index % 6;
                    $x = $xStart + ($col * ($boothWidth + $spacing));
                    $y = $yStart + ($row * ($boothHeight + $spacing));
                    
                    // Color based on type
                    $color = match($university->type) {
                        'PTN' => '#1e40af',
                        'PTS' => '#0891b2', 
                        'Kedinasan' => '#059669',
                        default => '#6b7280'
                    };
                @endphp

                <g class="booth-group cursor-pointer" 
                   data-booth="{{ $university->booth_number }}" 
                   data-university-id="{{ $university->id }}">
                   
                    <!-- Booth Rectangle -->
                    <rect x="{{ $x }}" y="{{ $y }}" 
                          width="{{ $boothWidth }}" height="{{ $boothHeight }}"
                          fill="white" stroke="{{ $color }}" stroke-width="2" 
                          rx="8" class="booth-rect transition-all hover:drop-shadow-lg"/>
                    
                    <!-- University Logo or Icon -->
                    @if($university->logo_url)
                        <image x="{{ $x + 10 }}" y="{{ $y + 5 }}" 
                               width="30" height="30" 
                               href="{{ $university->logo_url }}"/>
                    @else
                        <circle cx="{{ $x + 25 }}" cy="{{ $y + 20 }}" r="12" fill="{{ $color }}"/>
                        <text x="{{ $x + 25 }}" y="{{ $y + 26 }}" 
                              text-anchor="middle" fill="white" 
                              font-size="10" font-weight="bold">
                            {{ strtoupper(substr($university->name, 0, 3)) }}
                        </text>
                    @endif
                    
                    <!-- Booth Info -->
                    <text x="{{ $x + 40 }}" y="{{ $y + 45 }}" 
                          text-anchor="middle" fill="#1e293b" 
                          font-size="10" font-weight="600">
                        {{ $university->booth_number }}
                    </text>
                    <text x="{{ $x + 40 }}" y="{{ $y + 55 }}" 
                          text-anchor="middle" fill="#64748b" 
                          font-size="8">
                        {{ $university->type }}
                    </text>
                </g>
            @endforeach

            <!-- Entrance -->
            <path d="M 390 480 L 370 460 L 380 460 L 380 440 L 420 440 L 420 460 L 430 460 Z" 
                  fill="#10b981" stroke="#047857" stroke-width="2"/>
            <text x="400" y="495" text-anchor="middle" fill="#047857" font-size="12" font-weight="bold">MASUK</text>

            <!-- Tooltip (Hidden by default) -->
            <g id="tooltip" style="display: none;">
                <rect x="0" y="0" width="180" height="50" 
                      fill="#1f2937" stroke="#374151" stroke-width="1" 
                      rx="6" opacity="0.95"/>
                <text id="tooltip-title" x="10" y="18" fill="white" font-size="12" font-weight="bold"></text>
                <text id="tooltip-info" x="10" y="35" fill="#9ca3af" font-size="10"></text>
            </g>
        </svg>

        <!-- Zoom Controls -->
        <div class="absolute top-4 right-4 flex flex-col space-y-2">
            <button id="zoomIn" 
                    class="w-10 h-10 bg-white hover:bg-gray-50 rounded-lg shadow-md border border-gray-200 flex items-center justify-center transition-colors">
                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </button>
            <button id="zoomOut" 
                    class="w-10 h-10 bg-white hover:bg-gray-50 rounded-lg shadow-md border border-gray-200 flex items-center justify-center transition-colors">
                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"/>
                </svg>
            </button>
            <button id="resetZoom" 
                    class="w-10 h-10 bg-white hover:bg-gray-50 rounded-lg shadow-md border border-gray-200 flex items-center justify-center transition-colors">
                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Stats Summary -->
    <div class="bg-gray-50 border-t border-gray-200 p-4">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center text-sm">
            <div class="bg-blue-100 rounded-lg p-3">
                <div class="text-lg font-bold text-blue-700">{{ $universities->where('type', 'PTN')->count() }}</div>
                <div class="text-blue-600">PTN</div>
            </div>
            <div class="bg-cyan-100 rounded-lg p-3">
                <div class="text-lg font-bold text-cyan-700">{{ $universities->where('type', 'PTS')->count() }}</div>
                <div class="text-cyan-600">PTS</div>
            </div>
            <div class="bg-green-100 rounded-lg p-3">
                <div class="text-lg font-bold text-green-700">{{ $universities->where('type', 'Kedinasan')->count() }}</div>
                <div class="text-green-600">Kedinasan</div>
            </div>
            <div class="bg-purple-100 rounded-lg p-3">
                <div class="text-lg font-bold text-purple-700">{{ $universities->count() }}</div>
                <div class="text-purple-600">Total</div>
            </div>
        </div>
    </div>
</div>

<style>
/* Subtle hover effects */
.booth-group {
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}

.booth-group:hover .booth-rect {
    filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.15));
    stroke-width: 3;
}

.booth-group:hover {
    z-index: 5;
}

.booth-group:active .booth-rect {
    transform: scale(0.98);
    filter: drop-shadow(0 1px 4px rgba(0, 0, 0, 0.2));
}

/* Click feedback animation */
.booth-clicked {
    animation: clickPulse 0.3s ease-out;
}

@keyframes clickPulse {
    0% { 
        transform: scale(1);
        opacity: 1;
    }
    50% { 
        transform: scale(0.95);
        opacity: 0.8;
    }
    100% { 
        transform: scale(1);
        opacity: 1;
    }
}

/* Mobile touch optimizations */
@media (max-width: 640px) {
    .booth-group {
        touch-action: manipulation;
    }
    
    .booth-group:hover .booth-rect {
        /* Disable hover on touch devices */
        filter: none;
        stroke-width: 2;
    }
}

@media (hover: none) {
    .booth-group:hover .booth-rect {
        filter: none;
        stroke-width: 2;
    }
}
</style>

<script>
// Floor plan interaction functionality
document.addEventListener('DOMContentLoaded', function() {
    const svg = document.getElementById('floorPlanSVG');
    const tooltip = document.getElementById('tooltip');
    const tooltipTitle = document.getElementById('tooltip-title');
    const tooltipInfo = document.getElementById('tooltip-info');
    
    // University data from Laravel
    const universitiesData = @json($universities->keyBy('id'));
    
    // Booth click handlers
    const boothGroups = document.querySelectorAll('.booth-group');
    
    boothGroups.forEach(booth => {
        const universityId = booth.getAttribute('data-university-id');
        const boothNumber = booth.getAttribute('data-booth');
        const universityData = universitiesData[universityId];
        
        // Hover tooltip
        booth.addEventListener('mouseenter', function(e) {
            if (universityData && tooltip) {
                tooltipTitle.textContent = universityData.name;
                tooltipInfo.textContent = `${universityData.type} - Booth ${boothNumber}`;
                
                // Position tooltip
                const rect = svg.getBoundingClientRect();
                const mouseX = e.clientX - rect.left;
                const mouseY = e.clientY - rect.top;
                
                tooltip.setAttribute('transform', `translate(${Math.min(mouseX + 10, 600)}, ${Math.max(mouseY - 60, 10)})`);
                tooltip.style.display = 'block';
            }
        });
        
        booth.addEventListener('mouseleave', function() {
            if (tooltip) {
                tooltip.style.display = 'none';
            }
        });
        
        // Click handler
        booth.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            // Add click animation
            booth.classList.add('booth-clicked');
            setTimeout(() => booth.classList.remove('booth-clicked'), 300);
            
            console.log('=== BOOTH CLICK DEBUG ===');
            console.log('Booth clicked:', boothNumber);
            console.log('University ID:', universityId);
            console.log('University Data:', universityData);
            console.log('Modal function available?', typeof window.showUniversityModal === 'function');
            console.log('Parent modal function available?', window.parent && typeof window.parent.showUniversityModal === 'function');
            
            if (universityId && universityData) {
                // Call modal function if it exists
                if (typeof window.showUniversityModal === 'function') {
                    console.log('✓ Calling window.showUniversityModal with ID:', universityId);
                    window.showUniversityModal(universityId);
                } else if (window.parent && typeof window.parent.showUniversityModal === 'function') {
                    console.log('✓ Calling parent.showUniversityModal with ID:', universityId);
                    window.parent.showUniversityModal(universityId);
                } else {
                    console.log('✗ Modal function not found, redirecting to:', universityData.slug);
                    // Fallback: redirect to university detail page
                    window.location.href = `/universitas/${universityData.slug}`;
                }
            } else {
                console.log('✗ No university data found for booth:', boothNumber);
                console.log('Available universities:', @json($universities->pluck('name', 'booth_number')));
            }
            console.log('=========================');
        });
        
        // Touch handling for mobile
        let touchStartTime = 0;
        let touchMoved = false;
        
        booth.addEventListener('touchstart', function(e) {
            touchStartTime = Date.now();
            touchMoved = false;
        });
        
        booth.addEventListener('touchmove', function(e) {
            touchMoved = true;
        });
        
        booth.addEventListener('touchend', function(e) {
            const touchDuration = Date.now() - touchStartTime;
            
            if (touchDuration < 300 && !touchMoved && universityId && universityData) {
                e.preventDefault();
                e.stopPropagation();
                
                // Call modal function
                if (window.showUniversityModal) {
                    window.showUniversityModal(universityId);
                } else {
                    window.location.href = `/universitas/${universityData.slug}`;
                }
            }
        });
    });
    
    // Basic zoom controls (simplified)
    let currentScale = 1;
    const zoomStep = 0.2;
    const minScale = 0.5;
    const maxScale = 2;
    
    function updateZoom(scale) {
        currentScale = Math.max(minScale, Math.min(maxScale, scale));
        svg.style.transform = `scale(${currentScale})`;
        svg.style.transformOrigin = 'center center';
    }
    
    document.getElementById('zoomIn')?.addEventListener('click', () => {
        updateZoom(currentScale + zoomStep);
    });
    
    document.getElementById('zoomOut')?.addEventListener('click', () => {
        updateZoom(currentScale - zoomStep);
    });
    
    document.getElementById('resetZoom')?.addEventListener('click', () => {
        updateZoom(1);
    });
});
</script>

<style>
.booth-hover {
    filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.2));
    cursor: pointer;
}

.booth-clicked {
    animation: clickPulse 0.3s ease-out;
}

@keyframes clickPulse {
    0% { transform: scale(1); }
    50% { transform: scale(0.95); }
    100% { transform: scale(1); }
}
</style>