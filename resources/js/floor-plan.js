// Floor Plan Interactive JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const svg = document.getElementById('floorPlanSVG');
    const tooltip = document.getElementById('tooltip');
    const tooltipTitle = document.getElementById('tooltip-title');
    const tooltipType = document.getElementById('tooltip-type');
    const tooltipBooth = document.getElementById('tooltip-booth');

    let currentScale = 1;
    let isMouseDown = false;
    let startMouseX = 0;
    let startMouseY = 0;
    let startViewBoxX = 0;
    let startViewBoxY = 0;

    // Get current viewBox
    function getCurrentViewBox() {
        const viewBox = svg.getAttribute('viewBox').split(' ');
        return {
            x: parseFloat(viewBox[0]),
            y: parseFloat(viewBox[1]),
            width: parseFloat(viewBox[2]),
            height: parseFloat(viewBox[3])
        };
    }

    // Update viewBox
    function updateViewBox(x, y, width, height) {
        svg.setAttribute('viewBox', `${x} ${y} ${width} ${height}`);
    }

    // Zoom functionality
    function zoom(factor, centerX = 400, centerY = 300) {
        const viewBox = getCurrentViewBox();
        const newWidth = viewBox.width / factor;
        const newHeight = viewBox.height / factor;

        // Calculate new position to keep the center point stable
        const newX = viewBox.x + (viewBox.width - newWidth) * (centerX - viewBox.x) / viewBox.width;
        const newY = viewBox.y + (viewBox.height - newHeight) * (centerY - viewBox.y) / viewBox.height;

        // Limit zoom levels
        if (newWidth >= 400 && newWidth <= 1600) {
            currentScale *= factor;
            updateViewBox(newX, newY, newWidth, newHeight);
        }
    }

    // Mouse wheel zoom
    svg.addEventListener('wheel', function(e) {
        e.preventDefault();
        const rect = svg.getBoundingClientRect();
        const mouseX = (e.clientX - rect.left) / rect.width * getCurrentViewBox().width;
        const mouseY = (e.clientY - rect.top) / rect.height * getCurrentViewBox().height;

        const zoomFactor = e.deltaY > 0 ? 0.9 : 1.1;
        zoom(zoomFactor, mouseX, mouseY);
    });

    // Pan functionality
    svg.addEventListener('mousedown', function(e) {
        if (e.target.closest('.booth-group')) return; // Don't pan when clicking on booths

        isMouseDown = true;
        startMouseX = e.clientX;
        startMouseY = e.clientY;
        const viewBox = getCurrentViewBox();
        startViewBoxX = viewBox.x;
        startViewBoxY = viewBox.y;
        svg.style.cursor = 'grabbing';
    });

    document.addEventListener('mousemove', function(e) {
        if (!isMouseDown) return;

        const deltaX = (e.clientX - startMouseX) * (getCurrentViewBox().width / svg.clientWidth);
        const deltaY = (e.clientY - startMouseY) * (getCurrentViewBox().height / svg.clientHeight);

        const viewBox = getCurrentViewBox();
        updateViewBox(startViewBoxX - deltaX, startViewBoxY - deltaY, viewBox.width, viewBox.height);
    });

    document.addEventListener('mouseup', function() {
        isMouseDown = false;
        svg.style.cursor = 'default';
    });

    // Zoom controls
    document.getElementById('zoomIn')?.addEventListener('click', () => zoom(1.2));
    document.getElementById('zoomOut')?.addEventListener('click', () => zoom(0.8));
    document.getElementById('resetZoom')?.addEventListener('click', () => {
        currentScale = 1;
        updateViewBox(0, 0, 800, 600);
    });

    // Booth interactions
    const boothGroups = document.querySelectorAll('.booth-group');

    boothGroups.forEach(booth => {
        const universityId = booth.getAttribute('data-university-id');
        const boothNumber = booth.getAttribute('data-booth');

        // Hover effects
        booth.addEventListener('mouseenter', function(e) {
            // Get university data (you'll need to pass this from Laravel)
            const universityData = getUniversityData(universityId);

            if (universityData) {
                tooltipTitle.textContent = universityData.name;
                tooltipType.textContent = `${universityData.type} - ${universityData.category}`;
                tooltipBooth.textContent = `Booth ${boothNumber}`;

                // Position tooltip near mouse
                const rect = svg.getBoundingClientRect();
                const mouseX = e.clientX - rect.left;
                const mouseY = e.clientY - rect.top;

                tooltip.setAttribute('transform', `translate(${mouseX + 10}, ${mouseY - 70})`);
                tooltip.style.display = 'block';
            }

            // Add glow effect
            const boothRect = booth.querySelector('.booth-rect');
            boothRect.style.filter = 'drop-shadow(0 0 20px rgba(59, 130, 246, 0.6))';
        });

        booth.addEventListener('mouseleave', function() {
            tooltip.style.display = 'none';

            // Remove glow effect
            const boothRect = booth.querySelector('.booth-rect');
            boothRect.style.filter = '';
        });

        // Click to show university details
        booth.addEventListener('click', function() {
            if (universityId) {
                showUniversityModal(universityId);
            }
        });
    });

    // Touch support for mobile
    let touchStartX = 0;
    let touchStartY = 0;
    let touchStartDistance = 0;

    svg.addEventListener('touchstart', function(e) {
        if (e.touches.length === 1) {
            // Single touch - pan
            touchStartX = e.touches[0].clientX;
            touchStartY = e.touches[0].clientY;
            const viewBox = getCurrentViewBox();
            startViewBoxX = viewBox.x;
            startViewBoxY = viewBox.y;
        } else if (e.touches.length === 2) {
            // Two touches - zoom
            const dx = e.touches[0].clientX - e.touches[1].clientX;
            const dy = e.touches[0].clientY - e.touches[1].clientY;
            touchStartDistance = Math.sqrt(dx * dx + dy * dy);
        }
        e.preventDefault();
    });

    svg.addEventListener('touchmove', function(e) {
        if (e.touches.length === 1) {
            // Pan
            const deltaX = (e.touches[0].clientX - touchStartX) * (getCurrentViewBox().width / svg.clientWidth);
            const deltaY = (e.touches[0].clientY - touchStartY) * (getCurrentViewBox().height / svg.clientHeight);

            const viewBox = getCurrentViewBox();
            updateViewBox(startViewBoxX - deltaX, startViewBoxY - deltaY, viewBox.width, viewBox.height);
        } else if (e.touches.length === 2) {
            // Pinch zoom
            const dx = e.touches[0].clientX - e.touches[1].clientX;
            const dy = e.touches[0].clientY - e.touches[1].clientY;
            const distance = Math.sqrt(dx * dx + dy * dy);

            const zoomFactor = distance / touchStartDistance;
            if (Math.abs(zoomFactor - 1) > 0.1) { // Threshold to prevent jitter
                const centerX = (e.touches[0].clientX + e.touches[1].clientX) / 2;
                const centerY = (e.touches[0].clientY + e.touches[1].clientY) / 2;

                const rect = svg.getBoundingClientRect();
                const svgX = (centerX - rect.left) / rect.width * getCurrentViewBox().width;
                const svgY = (centerY - rect.top) / rect.height * getCurrentViewBox().height;

                zoom(zoomFactor, svgX, svgY);
                touchStartDistance = distance;
            }
        }
        e.preventDefault();
    });
});

// Helper function to get university data
function getUniversityData(universityId) {
    // Get universities data from parent window (passed from Laravel blade)
    const universities = window.parent?.universitiesData || window.universitiesData || {};
    return universities[universityId] || null;
}

// Function to show university modal (to be implemented)
function showUniversityModal(universityId) {
    console.log('Show modal for university:', universityId);
    // This will be implemented in the modal component
    if (window.openUniversityModal) {
        window.openUniversityModal(universityId);
    }
}

// Search and filter functionality
function highlightBooths(searchTerm, filterType = 'all') {
    const boothGroups = document.querySelectorAll('.booth-group');

    boothGroups.forEach(booth => {
        const universityId = booth.getAttribute('data-university-id');
        const universityData = getUniversityData(universityId);

        if (!universityData) {
            booth.style.opacity = '0.3';
            return;
        }

        let matchesSearch = true;
        let matchesFilter = true;

        // Search filter
        if (searchTerm && searchTerm.trim() !== '') {
            const searchableText = (
                universityData.name + ' ' + 
                booth.getAttribute('data-booth') + ' ' + 
                universityData.type + ' ' + 
                universityData.category
            ).toLowerCase();
            matchesSearch = searchableText.includes(searchTerm.toLowerCase());
        }

        // Type/Category filter
        if (filterType !== 'all') {
            switch (filterType) {
                case 'ptn':
                    matchesFilter = universityData.type === 'PTN';
                    break;
                case 'pts':
                    matchesFilter = universityData.type === 'PTS';
                    break;
                case 'saintek':
                    matchesFilter = universityData.category === 'Saintek';
                    break;
                case 'soshum':
                    matchesFilter = universityData.category === 'Soshum';
                    break;
                default:
                    matchesFilter = true;
            }
        }

        // Apply visual feedback
        const boothRect = booth.querySelector('.booth-rect');
        const universityText = booth.querySelector('.university-text');
        
        if (matchesSearch && matchesFilter) {
            // Highlight matching booths
            booth.style.opacity = '1';
            boothRect.style.stroke = '#3b82f6';
            boothRect.style.strokeWidth = '2';
            
            if (searchTerm && searchTerm.trim() !== '') {
                // Add pulsing animation for search results
                boothRect.style.animation = 'pulse 2s infinite';
            } else {
                boothRect.style.animation = '';
            }
        } else {
            // Dim non-matching booths
            booth.style.opacity = '0.3';
            boothRect.style.stroke = '#e5e7eb';
            boothRect.style.strokeWidth = '1';
            boothRect.style.animation = '';
        }
    });

    // Add CSS animation if it doesn't exist
    if (!document.getElementById('floorPlanAnimations')) {
        const style = document.createElement('style');
        style.id = 'floorPlanAnimations';
        style.textContent = `
            @keyframes pulse {
                0%, 100% { 
                    stroke: #3b82f6; 
                    stroke-width: 2; 
                }
                50% { 
                    stroke: #1d4ed8; 
                    stroke-width: 3; 
                }
            }
        `;
        document.head.appendChild(style);
    }
}

// Zoom control buttons
const zoomInBtn = document.getElementById('zoomInBtn');
const zoomOutBtn = document.getElementById('zoomOutBtn');
const zoomResetBtn = document.getElementById('zoomResetBtn');

if (zoomInBtn) {
    zoomInBtn.addEventListener('click', () => {
        const viewBox = getCurrentViewBox();
        const centerX = viewBox.x + viewBox.width / 2;
        const centerY = viewBox.y + viewBox.height / 2;
        zoom(1.2, centerX, centerY);
    });
}

if (zoomOutBtn) {
    zoomOutBtn.addEventListener('click', () => {
        const viewBox = getCurrentViewBox();
        const centerX = viewBox.x + viewBox.width / 2;
        const centerY = viewBox.y + viewBox.height / 2;
        zoom(0.8, centerX, centerY);
    });
}

if (zoomResetBtn) {
    zoomResetBtn.addEventListener('click', () => {
        currentScale = 1;
        updateViewBox(0, 0, 800, 600);
    });
}

// Enhanced mobile touch support
let touchTimeout = null;
let touchMoved = false;

// Prevent default touch behaviors that interfere with panning
document.addEventListener('touchstart', function(e) {
    if (e.target.closest('#floorPlanSVG')) {
        // Allow single touch for tapping booths, prevent default for multi-touch
        if (e.touches.length > 1) {
            e.preventDefault();
        }
    }
}, { passive: false });

document.addEventListener('touchmove', function(e) {
    if (e.target.closest('#floorPlanSVG')) {
        touchMoved = true;
        e.preventDefault();
    }
}, { passive: false });

// Improve booth tap detection on mobile
document.querySelectorAll('.booth-group').forEach(booth => {
    let touchStartTime = 0;
    
    booth.addEventListener('touchstart', function(e) {
        touchStartTime = Date.now();
        touchMoved = false;
        e.stopPropagation();
    });
    
    booth.addEventListener('touchend', function(e) {
        const touchDuration = Date.now() - touchStartTime;
        
        // Only trigger click if it was a quick tap and no movement
        if (touchDuration < 300 && !touchMoved) {
            const universityId = this.getAttribute('data-university-id');
            if (universityId && window.showUniversityModal) {
                window.showUniversityModal(universityId);
            }
        }
        e.stopPropagation();
        e.preventDefault();
    });
});

// Export functions for use in other components
window.floorPlan = {
    highlightBooths,
    zoom: (factor) => zoom(factor),
    resetView: () => {
        currentScale = 1;
        updateViewBox(0, 0, 800, 600);
    }
};
