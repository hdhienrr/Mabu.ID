/**
 * MABU - Global Theme Switcher & Persistence (Light / Dark Mode)
 */
(function () {
    // 1. Immediately apply saved theme on load (prevents FOUC)
    const savedTheme = localStorage.getItem('mabu-theme') || 
        (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

    function applyThemeToDOM(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        if (theme === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }

    applyThemeToDOM(savedTheme);

    // 2. Sync icons
    function syncIcons(theme) {
        const sunIcon = document.getElementById('theme-sun-icon');
        const moonIcon = document.getElementById('theme-moon-icon');
        if (theme === 'dark') {
            sunIcon?.classList.remove('hidden');
            moonIcon?.classList.add('hidden');
        } else {
            sunIcon?.classList.add('hidden');
            moonIcon?.classList.remove('hidden');
        }
    }

    // 3. Public theme updater
    window.applyTheme = function (theme) {
        applyThemeToDOM(theme);
        localStorage.setItem('mabu-theme', theme);
        syncIcons(theme);
    };

    // 4. Attach toggle button listener when DOM is ready
    function setupThemeToggle() {
        const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
        syncIcons(currentTheme);

        const themeToggleBtn = document.getElementById('theme-toggle');
        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', function () {
                const activeTheme = document.documentElement.getAttribute('data-theme') || 'light';
                const nextTheme = activeTheme === 'light' ? 'dark' : 'light';
                window.applyTheme(nextTheme);
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupThemeToggle);
    } else {
        setupThemeToggle();
    }
})();
