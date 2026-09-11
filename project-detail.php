<?php
/**
 * Thun Game Portfolio - Dedicated Project Detail Page
 * Features: Video Trailer First, Balanced Editorial Flow, Role & Technical Highlights, Lightbox Gallery
 */

$projectsJson = file_get_contents(__DIR__ . '/data/projects.json');
$projects = json_decode($projectsJson, true) ?? [];

$slug = $_GET['slug'] ?? '';
$project = null;

// Find requested project by slug (case-insensitive for flexible CV links like /project/ROPE)
foreach ($projects as $p) {
    if (strcasecmp($p['slug'], $slug) === 0) {
        $project = $p;
        break;
    }
}

// Fallback to first project if slug not found
if (!$project && count($projects) > 0) {
    $project = $projects[0];
}

$pageTitle = ($project['title_vi'] ?? 'Chi Tiết Dự Án') . " // lphThuan.dev";
$activeNav = "projects";
$extraScripts = ['assets/js/project-detail.js'];

require_once __DIR__ . '/includes/header.php';
?>

<main style="padding: 3rem 0 6rem;">
    <div class="container">
        <!-- Back Link Navigation -->
        <div class="back-btn-row">
            <a href="projects" class="btn btn-outline" style="padding: 8px 16px; font-size: 0.88rem;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <span data-i18n="projects.back_to_projects">Quay lại danh sách dự án</span>
            </a>
        </div>

        <!-- Detail Hero Header -->
        <div class="detail-hero">
            <h1 class="detail-title"
                data-i18n-vi="<?php echo htmlspecialchars($project['title_vi']); ?>"
                data-i18n-en="<?php echo htmlspecialchars($project['title_en']); ?>">
                <?php echo htmlspecialchars($project['title_vi']); ?>
            </h1>

            <p style="font-size: 1.15rem; max-width: 880px; line-height: 1.75; color: var(--text-secondary); margin-bottom: 2rem;"
               data-i18n-vi="<?php echo htmlspecialchars($project['short_desc_vi']); ?>"
               data-i18n-en="<?php echo htmlspecialchars($project['short_desc_en']); ?>">
                <?php echo htmlspecialchars($project['short_desc_vi']); ?>
            </p>

            <!-- 3-Column Metadata Grid (Equal columns with responsive auto-scale) -->
            <div class="detail-meta-bar">
                <div class="detail-meta-col">
                    <span class="meta-sub" data-i18n="projects.team_label">Quy mô nhóm</span>
                    <span class="meta-main"
                          data-i18n-vi="<?php echo htmlspecialchars($project['team_size']); ?>"
                          data-i18n-en="<?php echo htmlspecialchars($project['team_size_en'] ?? $project['team_size']); ?>">
                        <?php echo htmlspecialchars($project['team_size']); ?>
                    </span>
                </div>

                <div class="detail-meta-col">
                    <span class="meta-sub" data-i18n="projects.duration_label">Thời gian</span>
                    <span class="meta-main"
                          data-i18n-vi="<?php echo htmlspecialchars($project['duration_vi']); ?>"
                          data-i18n-en="<?php echo htmlspecialchars($project['duration_en']); ?>">
                        <?php echo htmlspecialchars($project['duration_vi']); ?>
                    </span>
                </div>

                <div class="detail-meta-col">
                    <span class="meta-sub" data-i18n="projects.platform_label">Nền tảng</span>
                    <span class="meta-main"><?php echo htmlspecialchars($project['platform']); ?></span>
                </div>
            </div>

            <!-- Action Links: Download & GitHub -->
            <div style="display: flex; gap: 14px; margin-bottom: 3.5rem; flex-wrap: wrap;">
                <?php if (!empty($project['demo_link'])): ?>
                    <a href="<?php echo htmlspecialchars($project['demo_link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-zalo" style="padding: 12px 24px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <span data-i18n="projects.play_demo">Tải game</span>
                    </a>
                <?php endif; ?>

                <?php if (!empty($project['github_link'])): ?>
                    <a href="<?php echo htmlspecialchars($project['github_link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-github" style="padding: 12px 24px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                        </svg>
                        <span data-i18n="projects.source_code">Mã Nguồn GitHub</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Section 1: Video Trailer (ĐƯỢC ĐƯA LÊN ĐẦU TIÊN) -->
        <?php if (!empty($project['trailer_video'])): ?>
            <div class="video-section-box">
                <div class="section-header" style="text-align: left; margin-bottom: 1.5rem;">
                    <h2 style="font-size: 1.8rem;">
                        <span class="text-gradient" data-i18n="projects.trailer_title">Video Trailer Giới Thiệu</span>
                    </h2>
                </div>

                <div class="video-frame-wrap">
                    <iframe src="<?php echo htmlspecialchars($project['trailer_video']); ?>" 
                            title="<?php echo htmlspecialchars($project['title_vi']); ?> Video Player" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        <?php endif; ?>

        <!-- Section 2: Story & Gameplay Presentation (Balanced with interspersed images) -->
        <?php if (!empty($project['story_desc_vi'])): ?>
            <div class="editorial-section">
                <!-- Block 1: Story & Journey -->
                <div class="editorial-block glass-panel">
                    <h2 class="text-gradient" style="font-size: 1.6rem; margin-bottom: 1.25rem;" data-i18n="projects.story_title">
                        Cốt Truyện & Hành Trình Phiêu Lưu
                    </h2>
                    <div class="editorial-grid-split">
                        <div class="editorial-text-col">
                            <p data-i18n-vi="<?php echo htmlspecialchars($project['story_desc_vi']); ?>"
                               data-i18n-en="<?php echo htmlspecialchars($project['story_desc_en']); ?>">
                                <?php echo htmlspecialchars($project['story_desc_vi']); ?>
                            </p>
                        </div>
                        <div class="gallery-item editorial-media-card">
                            <img src="assets/images/projects/the-flower/the-flower-village.jpg" 
                                 alt="Map 1: Ngôi Làng khởi đầu của Mia và Leo" 
                                 class="gallery-img"
                                 loading="lazy">
                            <div class="editorial-media-caption"
                                 data-i18n-vi="Map 1: Khung cảnh Ngôi Làng khởi đầu của Mia và Leo với đồ họa Stylized tươi sáng"
                                 data-i18n-en="Map 1: The starting Village of Mia and Leo with vibrant stylized visuals">
                                Map 1: Khung cảnh Ngôi Làng khởi đầu của Mia và Leo với đồ họa Stylized tươi sáng
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Block 2: Cooperative Puzzles -->
                <div class="editorial-block glass-panel">
                    <h2 class="text-gradient" style="font-size: 1.6rem; margin-bottom: 1.25rem;" data-i18n="projects.gameplay_puzzles_title">
                        Lối Chơi Hợp Tác & Giải Đố Môi Trường
                    </h2>
                    <div class="editorial-text-col" style="margin-bottom: 1.5rem;">
                        <p data-i18n-vi="<?php echo htmlspecialchars($project['gameplay_puzzles_desc_vi']); ?>"
                           data-i18n-en="<?php echo htmlspecialchars($project['gameplay_puzzles_desc_en']); ?>">
                            <?php echo htmlspecialchars($project['gameplay_puzzles_desc_vi']); ?>
                        </p>
                    </div>
                    <div class="editorial-dual-images">
                        <div class="gallery-item editorial-media-card">
                            <img src="assets/images/projects/the-flower/the-flower-forest-checkpoint.jpg" 
                                 alt="Thử thách Đầm Sen và Trạm Checkpoint Cây Nấm" 
                                 class="gallery-img"
                                 loading="lazy">
                            <div class="editorial-media-caption"
                                 data-i18n-vi="Map 1: Thử thách Bẫy Lá Sen, Đầm nước sâu và Checkpoint Cây Nấm phát sáng"
                                 data-i18n-en="Map 1: Lily Pad puzzle coordination and glowing Crystal Mushroom checkpoint">
                                Map 1: Thử thách Bẫy Lá Sen, Đầm nước sâu và Checkpoint Cây Nấm phát sáng
                            </div>
                        </div>
                        <div class="gallery-item editorial-media-card">
                            <img src="assets/images/projects/the-flower/the-flower-desert-oasis.jpg" 
                                 alt="Sa mạc Ốc đảo & Cột Gió Nâng" 
                                 class="gallery-img"
                                 loading="lazy">
                            <div class="editorial-media-caption"
                                 data-i18n-vi="Map 2: Sa mạc Ốc đảo, Cầu treo hẻm núi và hệ thống Cột Gió Nâng (Wind Updrafts)"
                                 data-i18n-en="Map 2: Desert Oasis, canyon suspension bridges, and Wind Updraft launch pads">
                                Map 2: Sa mạc Ốc đảo, Cầu treo hẻm núi và hệ thống Cột Gió Nâng (Wind Updrafts)
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Block 3: Climax & Boss Encounter -->
                <div class="editorial-block glass-panel">
                    <h2 class="text-gradient" style="font-size: 1.6rem; margin-bottom: 1.25rem;" data-i18n="projects.boss_title">
                        Đua Thuyền Cát & Trận Đấu Trùm Cuối
                    </h2>
                    <div class="editorial-text-col" style="margin-bottom: 1.5rem;">
                        <p data-i18n-vi="<?php echo htmlspecialchars($project['boss_desc_vi']); ?>"
                           data-i18n-en="<?php echo htmlspecialchars($project['boss_desc_en']); ?>">
                            <?php echo htmlspecialchars($project['boss_desc_vi']); ?>
                        </p>
                    </div>
                    <div class="editorial-dual-images">
                        <div class="gallery-item editorial-media-card">
                            <img src="assets/images/projects/the-flower/the-flower-ancient-temple.jpg" 
                                 alt="Đại sảnh Đền Cổ linh thiêng" 
                                 class="gallery-img"
                                 loading="lazy">
                            <div class="editorial-media-caption"
                                 data-i18n-vi="Đại sảnh Đền Cổ linh thiêng - Nơi diễn ra câu đố Gương Thần và Bàn Cờ Eris"
                                 data-i18n-en="Ancient Temple Hall - Setting for the Magic Mirror and Eris Chessboard">
                                Đại sảnh Đền Cổ linh thiêng - Nơi diễn ra câu đố Gương Thần và Bàn Cờ Eris
                            </div>
                        </div>
                        <div class="gallery-item editorial-media-card">
                            <img src="assets/images/projects/the-flower/the-flower-cat-sphinx-boss.jpg" 
                                 alt="Trùm Cuối Thần Nhân Sư Mèo" 
                                 class="gallery-img"
                                 loading="lazy">
                            <div class="editorial-media-caption"
                                 data-i18n-vi="Phòng Đấu Trùm Cuối: Thần Nhân Sư Mèo với cơ chế Kích Hoạt Kép (Dual Activation)"
                                 data-i18n-en="Final Boss Chamber: Cat Sphinx Guardian with synchronized Dual Activation platforms">
                                Phòng Đấu Trùm Cuối: Thần Nhân Sư Mèo với cơ chế Kích Hoạt Kép (Dual Activation)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Fallback standard overview for other projects -->
            <div class="glass-panel" style="padding: 2.5rem; margin-bottom: 3.5rem;">
                <h2 class="text-gradient" style="font-size: 1.8rem; margin-bottom: 1.25rem;">Tổng Quan Dự Án</h2>
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;"
                   data-i18n-vi="<?php echo htmlspecialchars($project['full_desc_vi']); ?>"
                   data-i18n-en="<?php echo htmlspecialchars($project['full_desc_en']); ?>">
                    <?php echo htmlspecialchars($project['full_desc_vi']); ?>
                </p>
            </div>
        <?php endif; ?>

        <!-- Section 3: Role & Technical Highlights (Dedicated Engineering Block) -->
        <div class="glass-panel" style="padding: 2.5rem; margin-bottom: 3.5rem;">
            <div style="margin-bottom: 1.5rem;">
                <h2 class="text-gradient" style="font-size: 1.8rem; margin-bottom: 0.75rem;" data-i18n="projects.tech_title">
                    Vai Trò & Đóng Góp Kỹ Thuật
                </h2>
                <div class="role-badge-panel">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                    <span data-i18n-vi="<?php echo htmlspecialchars($project['role_vi']); ?>"
                          data-i18n-en="<?php echo htmlspecialchars($project['role_en']); ?>">
                        <?php echo htmlspecialchars($project['role_vi']); ?>
                    </span>
                </div>
            </div>

            <?php if (!empty($project['highlights_vi'])): ?>
                <h3 style="font-size: 1.25rem; margin-bottom: 1.25rem; color: #c4b5fd;" data-i18n="projects.highlights_title">
                    Điểm Nhấn Lập Trình Nổi Bật:
                </h3>
                <div class="highlights-grid">
                    <?php foreach ($project['highlights_vi'] as $idx => $hlVi): ?>
                        <?php $hlEn = $project['highlights_en'][$idx] ?? $hlVi; ?>
                        <div class="highlight-card">
                            <span style="color: var(--accent-cyan); font-weight: bold; font-size: 1.1rem; flex-shrink: 0; line-height: 1.4;">✦</span>
                            <div data-i18n-vi="<?php echo htmlspecialchars($hlVi); ?>"
                                 data-i18n-en="<?php echo htmlspecialchars($hlEn); ?>">
                                <?php echo htmlspecialchars($hlVi); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Section 4: Video Tự Loop Demo Cơ Chế (Nếu có) -->
        <?php if (!empty($project['mechanic_loop_video'])): ?>
            <div class="glass-panel looper-container">
                <div class="looper-header">
                    <div>
                        <span class="looper-badge">
                            <span class="pulse-dot" style="background-color: var(--accent-cyan); box-shadow: 0 0 8px var(--accent-cyan);"></span>
                            AUTOPLAY LOOP &bull; 60 FPS
                        </span>
                        <h2 style="font-size: 1.6rem; margin-top: 0.75rem;" 
                            data-i18n-vi="<?php echo htmlspecialchars($project['mechanic_title_vi'] ?? 'Demo Cơ Chế Gameplay'); ?>"
                            data-i18n-en="<?php echo htmlspecialchars($project['mechanic_title_en'] ?? 'Gameplay Mechanic Demo'); ?>">
                            <?php echo htmlspecialchars($project['mechanic_title_vi'] ?? 'Demo Cơ Chế Gameplay'); ?>
                        </h2>
                    </div>
                </div>

                <p style="color: var(--text-muted); margin-bottom: 1.5rem;" data-i18n="projects.looper_desc">
                    Đoạn video ngắn tự động chạy lặp lại để biểu diễn chi tiết cơ chế tương tác, vật lý và xử lý logic gameplay.
                </p>

                <div class="looper-video-wrap">
                    <video class="looper-video" 
                           src="<?php echo htmlspecialchars($project['mechanic_loop_video']); ?>" 
                           autoplay 
                           loop 
                           muted 
                           playsinline>
                        Trình duyệt của bạn không hỗ trợ thẻ video HTML5.
                    </video>
                </div>
            </div>
        <?php endif; ?>

        <!-- Section 5: Gallery (For other projects that don't have editorial blocks) -->
        <?php if (empty($project['story_desc_vi']) && !empty($project['gallery'])): ?>
            <div class="gallery-section">
                <div class="section-header" style="text-align: left; margin-bottom: 1.5rem;">
                    <h2 style="font-size: 1.8rem;" class="text-gradient" data-i18n="projects.gallery_title">
                        Bộ Sưu Tập Hình Ảnh Trong Game
                    </h2>
                    <p style="color: var(--text-muted); font-size: 0.95rem;" data-i18n="projects.gallery_hint">
                        Bấm vào hình ảnh bất kỳ để xem toàn màn hình
                    </p>
                </div>

                <div class="gallery-grid">
                    <?php foreach ($project['gallery'] as $img): ?>
                        <div class="gallery-item glass-panel">
                            <img src="<?php echo htmlspecialchars($img['url']); ?>" 
                                 alt="<?php echo htmlspecialchars($img['caption_vi']); ?>" 
                                 class="gallery-img" 
                                 loading="lazy">
                            <div class="gallery-overlay"
                                 data-i18n-vi="<?php echo htmlspecialchars($img['caption_vi']); ?>"
                                 data-i18n-en="<?php echo htmlspecialchars($img['caption_en']); ?>">
                                <?php echo htmlspecialchars($img['caption_vi']); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Lightbox Fullscreen Modal -->
<div class="lightbox-modal" id="lightbox-modal" role="dialog" aria-modal="true" aria-label="Image Preview">
    <button type="button" class="lightbox-close-btn" id="lightbox-close" aria-label="Close Lightbox">&times;</button>
    <div class="lightbox-content">
        <img src="" alt="" class="lightbox-img" id="lightbox-img">
        <div class="lightbox-caption" id="lightbox-caption"></div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
