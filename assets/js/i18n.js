/**
 * Thun Game Portfolio - Multi-Language (i18n) Engine
 * Seamless Client-Side English - Vietnamese Switching
 */

(function () {
  'use strict';

  const STORAGE_KEY_LANG = 'thun_portfolio_lang';
  let currentTranslations = {};
  let currentLang = 'vi';

  // Fetch or initialize translations
  async function loadTranslations() {
    try {
      const response = await fetch('data/translations.json?v=' + Date.now());
      if (!response.ok) throw new Error('Failed to load translations');
      currentTranslations = await response.json();
      
      // Determine initial language
      const savedLang = localStorage.getItem(STORAGE_KEY_LANG);
      if (savedLang && (savedLang === 'vi' || savedLang === 'en')) {
        currentLang = savedLang;
      } else {
        // Detect browser language
        const navLang = navigator.language || navigator.userLanguage || '';
        currentLang = navLang.startsWith('vi') ? 'vi' : 'vi'; // Default to VI
      }

      applyLanguage(currentLang);
      setupEventListeners();
    } catch (err) {
      console.error('i18n initialization failed:', err);
    }
  }

  function getNestedTranslation(obj, keyPath) {
    return keyPath.split('.').reduce((prev, curr) => {
      return prev ? prev[curr] : null;
    }, obj);
  }

  function applyLanguage(lang) {
    currentLang = lang;
    localStorage.setItem(STORAGE_KEY_LANG, lang);
    document.documentElement.setAttribute('lang', lang);

    // 1. Update dynamic project cards/details immediately
    document.querySelectorAll('[data-i18n-vi][data-i18n-en]').forEach((el) => {
      const val = lang === 'vi' ? el.getAttribute('data-i18n-vi') : el.getAttribute('data-i18n-en');
      if (val) el.textContent = val;
    });

    if (!currentTranslations[lang]) return;
    const langData = currentTranslations[lang];

    // 2. Update text nodes
    document.querySelectorAll('[data-i18n]').forEach((el) => {
      const key = el.getAttribute('data-i18n');
      const val = getNestedTranslation(langData, key);
      if (val !== null && val !== undefined) {
        el.textContent = val;
      }
    });

    // 3. Update HTML nodes
    document.querySelectorAll('[data-i18n-html]').forEach((el) => {
      const key = el.getAttribute('data-i18n-html');
      const val = getNestedTranslation(langData, key);
      if (val !== null && val !== undefined) {
        el.innerHTML = val;
      }
    });

    // 4. Update Header Flag and Code Button
    const currentFlagImg = document.getElementById('current-flag-img');
    const currentLangCode = document.getElementById('current-lang-code');

    if (currentFlagImg && currentLangCode) {
      if (lang === 'vi') {
        currentFlagImg.src = 'assets/images/flags/vn.svg';
        currentFlagImg.alt = 'Vietnam Flag';
        currentLangCode.textContent = 'VI';
      } else {
        currentFlagImg.src = 'assets/images/flags/gb.svg';
        currentFlagImg.alt = 'UK Flag';
        currentLangCode.textContent = 'EN';
      }
    }

    // 5. Update dropdown active states
    document.querySelectorAll('.lang-option').forEach((opt) => {
      if (opt.getAttribute('data-lang') === lang) {
        opt.classList.add('active');
      } else {
        opt.classList.remove('active');
      }
    });

    // 6. Dispatch custom event for page-specific components
    window.dispatchEvent(new CustomEvent('thun_language_changed', { detail: { lang } }));
  }

  function setupEventListeners() {
    const dropdownWrapper = document.querySelector('.lang-dropdown-wrapper');
    const langBtn = document.getElementById('lang-select-btn');

    if (langBtn && dropdownWrapper) {
      // Toggle dropdown on click for mobile/touch
      langBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdownWrapper.classList.toggle('open');
      });

      // Close dropdown when clicking outside
      document.addEventListener('click', (e) => {
        if (!dropdownWrapper.contains(e.target)) {
          dropdownWrapper.classList.remove('open');
        }
      });
    }

    // Handle language selection
    document.querySelectorAll('.lang-option').forEach((opt) => {
      opt.addEventListener('click', () => {
        const selectedLang = opt.getAttribute('data-lang');
        if (selectedLang && selectedLang !== currentLang) {
          applyLanguage(selectedLang);
        }
        if (dropdownWrapper) dropdownWrapper.classList.remove('open');
      });
    });
  }

  // Expose global switcher
  window.ThunI18n = {
    setLanguage: applyLanguage,
    getCurrentLanguage: () => currentLang
  };

  // Run on DOM ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', loadTranslations);
  } else {
    loadTranslations();
  }

})();
