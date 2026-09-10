<?php
/**
 * Thun Game Portfolio - Dedicated Project Detail Page
 * Features: Trailer Video, Gameplay Video, Mechanic Looper, and Screenshot Gallery Lightbox
 */

$projectsJson = file_get_contents(__DIR__ . '/data/projects.json');
$projects = json_decode($projectsJson, true) ?? [];

$slug = $_GET['slug'] ?? '';
$project = null;

// Find requested project by slug
foreach ($projects as $p) {
    if ($p['slug'] === $slug) {
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
            <a href="projects.php" class="btn btn-outline" style="padding: 8px 16px; font-size: 0.88rem;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <span data-i18n="projects.back_to_projects">Quay lại danh sách dự án</span>
            </a>
        </div>

        <!-- Detail Hero Header -->
        <div class="detail-hero">
            <div style="display: flex; gap: 8px; margin-bottom: 1rem; flex-wrap: wrap;">
                <span class="badge badge-tech"><?php echo htmlspecialchars($project['engine']); ?></span>
                <span class="badge" style="background: rgba(6, 182, 212, 0.15); color: var(--accent-cyan);">
                    <?php echo htmlspecialchars($project['category_label_vi']); ?>
                </span>
            </div>

            <h1 class="detail-title"
                data-i18n-vi="<?php echo htmlspecialchars($project['title_vi']); ?>"
                data-i18n-en="<?php echo htmlspecialchars($project['title_en']); ?>">
                <?php echo htmlspecialchars($project['title_vi']); ?>
            </h1>

            <p style="font-size: 1.2rem; max-width: 850px; line-height: 1.7; color: var(--text-secondary);"
               data-i18n-vi="<?php echo htmlspecialchars($project['short_desc_vi']); ?>"
               data-i18n-en="<?php echo htmlspecialchars($project['short_desc_en']); ?>">
                <?php echo htmlspecialchars($project['short_desc_vi']); ?>
            </p>

            <!-- Metadata Information Bar -->
            <div class="detail-meta-bar">
                <div class="detail-meta-col">
                    <span class="meta-sub" data-i18n="projects.role_label">Vai trò</span>
                    <span class="meta-main" 
                          data-i18n-vi="<?php echo htmlspecialchars($project['role_vi']); ?>"
                          data-i18n-en="<?php echo htmlspecialchars($project['role_en']); ?>">
                        <?php echo htmlspecialchars($project['role_vi']); ?>
                    </span>
                </div>

                <div class="detail-meta-col">
                    <span class="meta-sub" data-i18n="projects.team_label">Quy mô nhóm</span>
                    <span class="meta-main"><?php echo htmlspecialchars($project['team_size']); ?></span>
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

            <!-- Action Links: Demo & GitHub -->
            <div style="display: flex; gap: 14px; margin-bottom: 3.5rem; flex-wrap: wrap;">
                <?php if (!empty($project['demo_link'])): ?>
                    <a href="<?php echo htmlspecialchars($project['demo_link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-zalo" style="padding: 12px 24px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="5 3 19 12 5 21 5 3"></polygon>
                        </svg>
                        <span data-i18n="projects.play_demo">Chơi Thử Demo</span>
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

        <!-- Section 1: Detailed Overview & Technical Highlights -->
        <div class="glass-panel" style="padding: 2.5rem; margin-bottom: 3.5rem;">
            <h2 class="text-gradient" style="font-size: 1.8rem; margin-bottom: 1.25rem;">Tổng Quan Kiến Trúc Kỹ Thuật</h2>
            <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;"
               data-i18n-vi="<?php echo htmlspecialchars($project['full_desc_vi']); ?>"
               data-i18n-en="<?php echo htmlspecialchars($project['full_desc_en']); ?>">
                <?php echo htmlspecialchars($project['full_desc_vi']); ?>
            </p>

            <?php if (!empty($project['highlights_vi'])): ?>
                <h3 style="font-size: 1.3rem; margin-bottom: 1rem; color: #c4b5fd;">Điểm Nhấn Lập Trình Nổi Bật:</h3>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px;">
                    <?php foreach ($project['highlights_vi'] as $idx => $hlVi): ?>
                        <?php $hlEn = $project['highlights_en'][$idx] ?? $hlVi; ?>
                        <li style="position: relative; padding-left: 26px; color: var(--text-secondary); line-height: 1.6;"
                            data-i18n-vi="<?php echo htmlspecialchars($hlVi); ?>"
                            data-i18n-en="<?php echo htmlspecialchars($hlEn); ?>">
                            <span style="position: absolute; left: 0; color: var(--accent-cyan); font-weight: bold;">✦</span>
                            <?php echo htmlspecialchars($hlVi); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <!-- Section 2: Video Trailer & Gameplay -->
        <div class="video-section-box">
            <div class="section-header" style="text-align: left; margin-bottom: 1.5rem;">
                <h2 style="font-size: 1.8rem;">
                    <span class="text-gradient" data-i18n="projects.trailer_title">Video Trailer Giới Thiệu</span> &bull; 
                    <span data-i18n="projects.gameplay_title">Gameplay Trực Tiếp</span>
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

        <!-- Section 3: Video Tự Loop Demo Cơ Chế (Mechanic Looper Component) -->
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

        <!-- Section 4: Image Gallery & Lightbox (Các hình ảnh) -->
        <?php if (!empty($project['gallery'])): ?>
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
