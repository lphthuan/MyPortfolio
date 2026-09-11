<?php
/**
 * Thun Game Portfolio - Global Header & Navigation
 */
if (!isset($pageTitle)) {
    $pageTitle = "lphThuan.dev // Game Developer Portfolio";
}
if (!isset($activeNav)) {
    $activeNav = "about";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="Portfolio Lập trình viên Game - Lê Phan Hòa Thuận (lphThuan.dev). Chuyên sâu về cơ chế gameplay, tương tác vật lý và phát triển game trên Unity & C#.">
    <meta name="theme-color" content="#080915">
    
    <!-- Google Fonts: Be Vietnam Pro & JetBrains Mono (Full Vietnamese Support) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <base href="/">

    <!-- Stylesheets with Cache Busting -->
    <link rel="stylesheet" href="assets/css/style.css?v=2.5">
    <link rel="stylesheet" href="assets/css/components.css?v=2.8">
</head>
<body>
    <!-- Ambient Background Glows -->
    <div class="ambient-glow" aria-hidden="true">
        <div class="glow-orb-1"></div>
        <div class="glow-orb-2"></div>
        <div class="glow-orb-3"></div>
    </div>

    <!-- Sticky Header Navigation -->
    <header class="site-header">
        <div class="container nav-container">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-logo" aria-label="lphThuan.dev Game Developer Portfolio">
                <div class="brand-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="6" y1="12" x2="10" y2="12"></line>
                        <line x1="8" y1="10" x2="8" y2="14"></line>
                        <line x1="15" y1="13" x2="15.01" y2="13"></line>
                        <line x1="18" y1="11" x2="18.01" y2="11"></line>
                        <rect x="2" y="6" width="20" height="12" rx="6"></rect>
                    </svg>
                </div>
                <span class="brand-text">lphThuan<span class="dot">.dev</span></span>
            </a>

            <!-- Navigation Links (Giới thiệu & Dự án) -->
            <nav>
                <ul class="nav-menu">
                    <li>
                        <a href="index.php" class="nav-link <?php echo $activeNav === 'about' ? 'active' : ''; ?>" data-i18n="nav.about">
                            Giới thiệu
                        </a>
                    </li>
                    <li>
                        <a href="projects" class="nav-link <?php echo $activeNav === 'projects' ? 'active' : ''; ?>" data-i18n="nav.projects">
                            Dự án
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Action Controls: Language & Theme Switchers -->
            <div class="nav-actions">
                <!-- Language Selector Dropdown -->
                <div class="lang-dropdown-wrapper">
                    <button type="button" class="lang-btn" id="lang-select-btn" aria-label="Select Language" title="Đổi ngôn ngữ">
                        <img id="current-flag-img" class="flag-icon" src="assets/images/flags/vn.svg" alt="Vietnam Flag">
                        <span id="current-lang-code" class="lang-code">VI</span>
                        <svg class="chevron-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="lang-dropdown-menu" role="menu">
                        <div class="lang-option active" data-lang="vi" role="menuitem">
                            <img class="flag-icon" src="assets/images/flags/vn.svg" alt="Tiếng Việt">
                            <span>Tiếng Việt</span>
                        </div>
                        <div class="lang-option" data-lang="en" role="menuitem">
                            <img class="flag-icon" src="assets/images/flags/gb.svg" alt="English">
                            <span>English</span>
                        </div>
                    </div>
                </div>

                <!-- Dark / Light Theme Toggle Switcher -->
                <button type="button" class="theme-switch-btn" id="theme-toggle-btn" aria-label="Toggle Dark/Light Mode" title="Chuyển đổi giao diện sáng/tối">
                    <!-- Sun Icon (shown in Dark mode) -->
                    <svg class="theme-icon theme-icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="5"></circle>
                        <line x1="12" y1="1" x2="12" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="23"></line>
                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                        <line x1="1" y1="12" x2="3" y2="12"></line>
                        <line x1="21" y1="12" x2="23" y2="12"></line>
                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                    </svg>
                    <!-- Moon Icon (shown in Light mode) -->
                    <svg class="theme-icon theme-icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </header>
