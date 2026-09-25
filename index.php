<?php
/**
 * Thun Game Portfolio - Home / About Me Page
 */
$pageTitle = "lphThuan.dev // Game Developer Portfolio";
$activeNav = "about";

// Load projects from JSON for featured showcase
$projectsJson = file_get_contents(__DIR__ . '/data/projects.json');
$projects = json_decode($projectsJson, true) ?? [];
$featuredProjects = array_slice($projects, 0, 3);

require_once __DIR__ . '/includes/header.php';
?>

<main>
    <!-- 1. Hero & Profile Section (Trang Giới Thiệu) -->
    <section class="hero-section" id="about">
        <div class="container">
            <!-- Profile Card (Cột trái: Avatar | Cột phải: Thông tin liên hệ | Dưới: Mô tả đặt chung một khung) -->
            <div class="glass-panel profile-card">
                <!-- Top Grid: Avatar + Personal & Contact Information -->
                <div class="profile-top-grid">
                    <!-- Left Column: Circular Avatar with Neon Glow Ring -->
                    <div class="profile-avatar-wrap">
                        <div class="avatar-ring">
                            <img src="assets/images/thuan-avatar-cafe.png?v=1" alt="Lê Phan Hòa Thuận - Game Developer Avatar" class="avatar-img" width="240" height="240">
                        </div>
                    </div>

                    <!-- Right Column: Personal & Contact Information -->
                    <div class="profile-info">
                        <span class="profile-greeting" data-i18n="hero.greeting">Xin chào, tôi là</span>
                        <h1 class="profile-name">
                            <span class="text-gradient" data-i18n="hero.name">Lê Phan Hòa Thuận</span>
                        </h1>
                        <div class="profile-role-tag" data-i18n="hero.role">
                            Game Developer
                        </div>

                        <!-- Contact Action Buttons: GitHub & Zalo -->
                        <div class="contact-actions-row">
                            <!-- GitHub Button -->
                            <a href="https://github.com/lphthuan/" target="_blank" rel="noopener noreferrer" class="btn btn-github" id="btn-github-link" aria-label="Visit GitHub Profile">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                                </svg>
                                <span data-i18n="hero.github_btn">Xem GitHub</span>
                            </a>

                            <!-- Zalo Button -->
                            <a href="https://zalo.me/0898333096" target="_blank" rel="noopener noreferrer" class="btn btn-zalo" id="btn-zalo-link" aria-label="Chat via Zalo">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2C6.48 2 2 6.48 2 12c0 1.9.54 3.68 1.48 5.18L2 22l4.98-1.42C8.42 21.49 10.15 22 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2zm1 14h-4c-.55 0-1-.45-1-1s.45-1 1-1h4c.55 0 1 .45 1 1s-.45 1-1 1zm2-4H9c-.55 0-1-.45-1-1s.45-1 1-1h6c.55 0 1 .45 1 1s-.45 1-1 1zm0-4H9c-.55 0-1-.45-1-1s.45-1 1-1h6c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                                </svg>
                                <span data-i18n="hero.zalo_btn">Nhắn tin Zalo</span>
                            </a>
                        </div>

                        <!-- Contact Meta Information Grid -->
                        <div class="contact-meta-grid" id="contact">
                            <!-- Location -->
                            <div class="meta-item">
                                <div class="meta-icon-box">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="meta-content">
                                    <span class="meta-label" data-i18n="contact.address_label">Địa chỉ:</span>
                                    <span class="meta-value" data-i18n="contact.address_val">Quận Ninh Kiều, TP Cần Thơ</span>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="meta-item">
                                <div class="meta-icon-box">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                    </svg>
                                </div>
                                <div class="meta-content">
                                    <span class="meta-label" data-i18n="contact.phone_label">Số điện thoại:</span>
                                    <a href="tel:0898333096" class="meta-value" data-i18n="contact.phone_val">0898 333 096</a>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="meta-item">
                                <div class="meta-icon-box">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                                <div class="meta-content">
                                    <span class="meta-label" data-i18n="contact.email_label">Email:</span>
                                    <a href="mailto:lephanhoathuan2006@gmail.com" class="meta-value" data-i18n="contact.email_val">lephanhoathuan2006@gmail.com</a>
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="meta-item">
                                <div class="meta-icon-box">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </div>
                                <div class="meta-content">
                                    <span class="meta-label" data-i18n="contact.dob_label">Ngày sinh:</span>
                                    <span class="meta-value" data-i18n="contact.dob_val">16/11/2006</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bio Description Section (Đặt chung trong cùng khung với thông tin ở trên) -->
                <div class="profile-bio-section">
                    <div class="bio-header-badge">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span data-i18n="hero.bio_title">MÔ TẢ BẢN THÂN</span>
                    </div>
                    <p class="bio-text" data-i18n="hero.bio_desc">
                        Tôi là một lập trình viên Game đã có hơn 18 tháng kinh nghiệm tiếp xúc với Unity.  Đã thực hiện nhiều dự án và trải nghiệm 3 tháng thực tập tại doanh nghiệp. Tôi mong muốn tìm kiếm công việc với vị trí Fresher hoặc tương đương. Mong muốn được làm việc trong môi trường chuyên nghiệp để tiếp tục trau dồi kỹ năng và phát triển bản thân. Cũng như tìm được một bến đỗ an toàn để gắn bó lâu dài và cống hiến hết mình cho công ty.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Featured Projects Showcase (Trang Dự án Tiêu biểu) -->
    <section class="section-block" id="projects" style="padding-bottom: 5rem;">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="text-gradient" data-i18n="projects.title">Dự Án</span>
                </h2>
            </div>

            <!-- Projects Editorial Cards Grid -->
            <div class="projects-editorial-grid">
                <?php foreach ($featuredProjects as $proj): ?>
                    <article class="glass-panel project-card">
                        <div class="project-thumb-wrap">
                            <img src="<?php echo htmlspecialchars($proj['thumbnail']); ?>" 
                                 alt="<?php echo htmlspecialchars($proj['title_vi']); ?>" 
                                 class="project-thumb-img" 
                                 loading="lazy">
                        </div>

                        <div class="project-body">
                            <div class="project-tags">
                                <?php foreach (array_slice($proj['tags'], 0, 3) as $tag): ?>
                                    <span class="badge" style="background: rgba(99, 102, 241, 0.1); color: var(--accent-cyan);">
                                        #<?php echo htmlspecialchars($tag); ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>

                            <h3 class="project-title" 
                                data-i18n-vi="<?php echo htmlspecialchars($proj['title_vi']); ?>"
                                data-i18n-en="<?php echo htmlspecialchars($proj['title_en']); ?>">
                                <?php echo htmlspecialchars($proj['title_vi']); ?>
                            </h3>

                            <p class="project-desc"
                               data-i18n-vi="<?php echo htmlspecialchars($proj['short_desc_vi']); ?>"
                               data-i18n-en="<?php echo htmlspecialchars($proj['short_desc_en']); ?>">
                                <?php echo htmlspecialchars($proj['short_desc_vi']); ?>
                            </p>

                            <div class="project-footer">
                                <a href="project/<?php echo urlencode($proj['slug']); ?>" class="link-explore">
                                    <span data-i18n="projects.view_detail">Xem chi tiết dự án</span>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

            <!-- View All Projects Button -->
            <div style="text-align: center;">
                <a href="projects" class="btn btn-github" style="padding: 14px 32px; font-size: 1.05rem;">
                    <span data-i18n="projects.view_all">Xem tất cả dự án</span>
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
