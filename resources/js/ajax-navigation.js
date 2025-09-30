// Simple AJAX Navigation for Navbar
document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 AJAX Navigation initialized!');
    
    // Add loading styles
    const style = document.createElement('style');
    style.textContent = `
        .ajax-loading { cursor: wait; }
        .ajax-loading main { opacity: 0.7; pointer-events: none; }
        #ajax-loading-bar {
            position: absolute;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #6366f1);
            z-index: 1000;
            transition: width 0.3s ease;
        }
        main { transition: opacity 0.3s ease; }
    `;
    document.head.appendChild(style);

    // Handle navbar clicks
    document.addEventListener('click', function(e) {
        const link = e.target.closest('nav a[href]');
        
        // Skip if not navbar link or external/special links
        if (!link || 
            link.hostname !== window.location.hostname ||
            link.getAttribute('href').startsWith('#') ||
            link.getAttribute('href').startsWith('mailto:') ||
            link.getAttribute('href').startsWith('tel:') ||
            link.hasAttribute('target') ||
            link.closest('form')) {
            return;
        }

        e.preventDefault();
        const url = link.getAttribute('href');
        
        // Don't reload same page
        if (url === window.location.href) {
            return;
        }

        loadPage(url);
    });

    // Handle browser back/forward
    window.addEventListener('popstate', function(e) {
        if (e.state && e.state.ajaxLoaded) {
            loadPage(window.location.href, false);
        }
    });

    // Save initial state
    history.replaceState({ ajaxLoaded: true }, document.title, window.location.href);

    async function loadPage(url, updateHistory = true) {
        try {
            showLoading();
            
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            });

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            const html = await response.text();
            
            // Parse new content
            const parser = new DOMParser();
            const newDoc = parser.parseFromString(html, 'text/html');
            
            // Find main content
            const newMain = newDoc.querySelector('main');
            const currentMain = document.querySelector('main');
            
            if (newMain && currentMain) {
                // Update content
                currentMain.innerHTML = newMain.innerHTML;
                
                // Update title
                const newTitle = newDoc.querySelector('title');
                if (newTitle) {
                    document.title = newTitle.textContent;
                }
                
                // Update browser history
                if (updateHistory) {
                    history.pushState({ ajaxLoaded: true }, document.title, url);
                }
                
                // Update active nav states
                updateNavigation(url);
                
                // Scroll to top
                window.scrollTo({ top: 0, behavior: 'smooth' });
                
                // Re-initialize scripts for new content
                reinitializeContent(currentMain);
                
                console.log('📄 Page loaded via AJAX:', url);
                
            } else {
                throw new Error('Could not find main content');
            }
            
        } catch (error) {
            console.error('❌ AJAX loading failed:', error);
            // Fallback to normal navigation
            window.location.href = url;
        } finally {
            hideLoading();
        }
    }

    function showLoading() {
        document.body.classList.add('ajax-loading');
        
        // Add loading bar
        const navbar = document.querySelector('nav');
        if (navbar && !document.getElementById('ajax-loading-bar')) {
            navbar.style.position = 'relative';
            const loadingBar = document.createElement('div');
            loadingBar.id = 'ajax-loading-bar';
            loadingBar.style.width = '0%';
            navbar.appendChild(loadingBar);
            
            // Animate
            setTimeout(() => loadingBar.style.width = '70%', 50);
            setTimeout(() => loadingBar.style.width = '90%', 200);
        }
    }

    function hideLoading() {
        document.body.classList.remove('ajax-loading');
        
        const loadingBar = document.getElementById('ajax-loading-bar');
        if (loadingBar) {
            loadingBar.style.width = '100%';
            setTimeout(() => loadingBar.remove(), 300);
        }
    }

    function updateNavigation(url) {
        // Remove active states
        document.querySelectorAll('nav a').forEach(link => {
            link.classList.remove('text-indigo-600', 'border-b-2', 'border-indigo-600', 'bg-indigo-50');
        });

        // Add active state to current link
        const activeLink = document.querySelector(`nav a[href="${url}"]`);
        if (activeLink) {
            activeLink.classList.add('text-indigo-600', 'border-b-2', 'border-indigo-600');
            
            // Mobile version
            const mobileLink = document.querySelector(`.md\\:hidden a[href="${url}"]`);
            if (mobileLink) {
                mobileLink.classList.add('text-indigo-600', 'bg-indigo-50');
            }
        }
    }

    function reinitializeContent(container) {
        // Re-initialize Alpine.js if present
        if (window.Alpine) {
            window.Alpine.initTree(container);
        }

        // Trigger custom event for other scripts
        window.dispatchEvent(new CustomEvent('ajaxContentLoaded', {
            detail: { container: container }
        }));

        // Re-run any page-specific initialization
        const scripts = container.querySelectorAll('script');
        scripts.forEach(script => {
            if (script.textContent && !script.src) {
                try {
                    eval(script.textContent);
                } catch (e) {
                    console.warn('Could not re-execute script:', e);
                }
            }
        });
    }

    // Global function for programmatic navigation
    window.ajaxNavigate = loadPage;
    
    console.log('✅ Simple AJAX Navigation ready!');
});