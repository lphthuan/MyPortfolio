/**
 * Thun Game Portfolio - Main JavaScript
 * Handles Theme Toggling (Dark/Light), Navbar Scrolling & Responsive Mobile Menu
 */

(function () {
  'use strict';

  // --- 1. Theme Management (Dark & Light Mode) ---
  const STORAGE_KEY_THEME = 'thun_portfolio_theme';
  const rootElement = document.documentElement;
  const themeSwitchBtn = document.getElementById('theme-toggle-btn');

  function getPreferredTheme() {
    const saved = localStorage.getItem(STORAGE_KEY_THEME);
    if (saved === 'light' || saved === 'dark') {
      return saved;
    }
    // Default to dark theme for gaming developer aesthetic
    return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
  }

  function applyTheme(theme) {
    if (theme === 'light') {
      rootElement.setAttribute('data-theme', 'light');
    } else {
      rootElement.removeAttribute('data-theme');
    }
    localStorage.setItem(STORAGE_KEY_THEME, theme);

    // Update aria attributes if button exists
    if (themeSwitchBtn) {
      themeSwitchBtn.setAttribute('aria-label', theme === 'light' ? 'Switch to Dark Mode' : 'Switch to Light Mode');
    }
  }

  // Initial theme application
  const initialTheme = getPreferredTheme();
  applyTheme(initialTheme);

  if (themeSwitchBtn) {
    themeSwitchBtn.addEventListener('click', () => {
      const currentTheme = rootElement.getAttribute('data-theme') === 'light' ? 'light' : 'dark';
      const newTheme = currentTheme === 'light' ? 'dark' : 'light';
      applyTheme(newTheme);
    });
  }

  // Listen to OS theme changes if user has no stored preference
  window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', (e) => {
    if (!localStorage.getItem(STORAGE_KEY_THEME)) {
      applyTheme(e.matches ? 'light' : 'dark');
    }
  });

  // --- 2. Navbar Scroll Effects ---
  const siteHeader = document.querySelector('.site-header');
  if (siteHeader) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 30) {
        siteHeader.classList.add('scrolled');
      } else {
        siteHeader.classList.remove('scrolled');
      }
    }, { passive: true });
  }

  // --- 3. Mobile Menu Toggle ---
  const mobileToggleBtn = document.getElementById('mobile-menu-toggle');
  const navMenu = document.querySelector('.nav-menu');

  if (mobileToggleBtn && navMenu) {
    mobileToggleBtn.addEventListener('click', () => {
      const isOpen = navMenu.classList.toggle('open');
      mobileToggleBtn.setAttribute('aria-expanded', isOpen);
    });
  }

})();
