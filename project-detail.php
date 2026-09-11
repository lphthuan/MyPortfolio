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
            <a href="projects" class="btn btn-outline" style="padding: 10px 20px; font-size: 0.9rem;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <span data-i18n="projects.back_to_projects" data-i18n-vi="Quay lại danh sách dự án" data-i18n-en="Back to Projects">Quay lại danh sách dự án</span>
            </a>
        </div>

        <!-- Detail Hero Header -->
        <div class="detail-hero">
            <h1 class="detail-title"
                data-i18n-vi="<?php echo htmlspecialchars($project['title_vi']); ?>"
                data-i18n-en="<?php echo htmlspecialchars($project['title_en']); ?>">
                <?php echo htmlspecialchars($project['title_vi']); ?>
            </h1>

            <p style="font-size: 1.15rem; max-width: 900px; line-height: 1.85; color: var(--text-secondary); margin-bottom: 2.5rem;"
               data-i18n-vi="<?php echo htmlspecialchars($project['short_desc_vi']); ?>"
               data-i18n-en="<?php echo htmlspecialchars($project['short_desc_en']); ?>">
                <?php echo htmlspecialchars($project['short_desc_vi']); ?>
            </p>

            <!-- 3-Column Metadata Grid (Equal columns with responsive auto-scale) -->
            <div class="detail-meta-bar">
                <div class="detail-meta-col">
                    <span class="meta-sub" data-i18n="projects.team_label" data-i18n-vi="Quy mô nhóm" data-i18n-en="Team Size">Quy mô nhóm</span>
                    <span class="meta-main"
                          data-i18n-vi="<?php echo htmlspecialchars($project['team_size']); ?>"
                          data-i18n-en="<?php echo htmlspecialchars($project['team_size_en'] ?? $project['team_size']); ?>">
                        <?php echo htmlspecialchars($project['team_size']); ?>
                    </span>
                </div>

                <div class="detail-meta-col">
                    <span class="meta-sub" data-i18n="projects.duration_label" data-i18n-vi="Thời gian" data-i18n-en="Duration">Thời gian</span>
                    <span class="meta-main"
                          data-i18n-vi="<?php echo htmlspecialchars($project['duration_vi']); ?>"
                          data-i18n-en="<?php echo htmlspecialchars($project['duration_en']); ?>">
                        <?php echo htmlspecialchars($project['duration_vi']); ?>
                    </span>
                </div>

                <div class="detail-meta-col">
                    <span class="meta-sub" data-i18n="projects.platform_label" data-i18n-vi="Nền tảng" data-i18n-en="Platform">Nền tảng</span>
                    <span class="meta-main"><?php echo htmlspecialchars($project['platform']); ?></span>
                </div>
            </div>

            <!-- Action Links: Download & GitHub -->
            <div style="display: flex; gap: 16px; margin-bottom: 4rem; flex-wrap: wrap;">
                <?php if (!empty($project['demo_link'])): ?>
                    <a href="<?php echo htmlspecialchars($project['demo_link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-zalo" style="padding: 12px 24px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <span data-i18n="projects.play_demo" data-i18n-vi="Tải game" data-i18n-en="Go to download">Tải game</span>
                    </a>
                <?php endif; ?>

                <?php if (!empty($project['github_link'])): ?>
                    <a href="<?php echo htmlspecialchars($project['github_link']); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-github" style="padding: 12px 24px;">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.53 1.032 1.53 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"/>
                        </svg>
                        <span data-i18n="projects.source_code" data-i18n-vi="Mã Nguồn GitHub" data-i18n-en="GitHub Repository">Mã Nguồn GitHub</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Section 1: Video Trailer (ĐƯỢC ĐƯA LÊN ĐẦU TIÊN) -->
        <?php if (!empty($project['trailer_video'])): ?>
            <div class="video-section-box">
                <div class="section-header" style="text-align: left; margin-bottom: 1.75rem;">
                    <h2 style="font-size: clamp(1.5rem, 3.5vw, 1.9rem);">
                        <span class="text-gradient" 
                              data-i18n="projects.trailer_title"
                              data-i18n-vi="Video Trailer Giới Thiệu"
                              data-i18n-en="Official Video Trailer">
                            Video Trailer Giới Thiệu
                        </span>
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
                <?php if (strcasecmp($project['slug'], 'the-flower') === 0): ?>
                    <!-- Block 1: Story & Journey -->
                    <div class="editorial-block glass-panel">
                        <h2 class="text-gradient editorial-heading" 
                            data-i18n="projects.story_title"
                            data-i18n-vi="Cốt Truyện & Hành Trình Phiêu Lưu"
                            data-i18n-en="Narrative & Adventure Journey">
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
                        <h2 class="text-gradient editorial-heading" 
                            data-i18n="projects.gameplay_puzzles_title"
                            data-i18n-vi="Lối Chơi Hợp Tác & Giải Đố Môi Trường"
                            data-i18n-en="Cooperative Gameplay & Environmental Puzzles">
                            Lối Chơi Hợp Tác & Giải Đố Môi Trường
                        </h2>
                        <div class="editorial-text-col editorial-text-full">
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
                        <h2 class="text-gradient editorial-heading" 
                            data-i18n="projects.boss_title"
                            data-i18n-vi="Đua Thuyền Cát & Trận Đấu Trùm Cuối"
                            data-i18n-en="Sand Boat Chase & Final Boss Encounter">
                            Đua Thuyền Cát & Trận Đấu Trùm Cuối
                        </h2>
                        <div class="editorial-text-col editorial-text-full">
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
                <?php elseif (strcasecmp($project['slug'], 'ROPE') === 0): ?>
                    <!-- Block 1: Story & Setting -->
                    <div class="editorial-block glass-panel">
                        <h2 class="text-gradient editorial-heading" 
                            data-i18n-vi="Cốt Truyện & Bối Cảnh Sinh Tồn"
                            data-i18n-en="Narrative & Survival Setting">
                            Cốt Truyện & Bối Cảnh Sinh Tồn
                        </h2>
                        <div class="editorial-grid-split">
                            <div class="editorial-text-col">
                                <p data-i18n-vi="<?php echo htmlspecialchars($project['story_desc_vi']); ?>"
                                   data-i18n-en="<?php echo htmlspecialchars($project['story_desc_en']); ?>">
                                    <?php echo htmlspecialchars($project['story_desc_vi']); ?>
                                </p>
                            </div>
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/rope/rope-map1-factory.png" 
                                     alt="Khu Phức Hợp Nhà Máy Bỏ Hoang" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Map 1: Khu Phức Hợp Nhà Máy Bỏ Hoang - Không gian công nghiệp nặng u tối nơi thử nghiệm các mẫu vật đột biến sinh học"
                                     data-i18n-en="Map 1: Abandoned Industrial Complex - Grim industrial environment where biological mutation experiments took place">
                                    Map 1: Khu Phức Hợp Nhà Máy Bỏ Hoang - Không gian công nghiệp nặng u tối nơi thử nghiệm các mẫu vật đột biến sinh học
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Block 2: Specialized Enemy AI Systems -->
                    <div class="editorial-block glass-panel">
                        <h2 class="text-gradient editorial-heading" 
                            data-i18n-vi="Hệ Thống Kẻ Địch AI Chuyên Biệt"
                            data-i18n-en="Specialized Enemy AI Systems">
                            Hệ Thống Kẻ Địch AI Chuyên Biệt
                        </h2>
                        <div class="editorial-text-col editorial-text-full">
                            <p data-i18n-vi="<?php echo htmlspecialchars($project['gameplay_puzzles_desc_vi']); ?>"
                               data-i18n-en="<?php echo htmlspecialchars($project['gameplay_puzzles_desc_en']); ?>">
                                <?php echo htmlspecialchars($project['gameplay_puzzles_desc_vi']); ?>
                            </p>
                        </div>
                        <div class="editorial-trio-images">
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/rope/rope-enemy-arathrox.png" 
                                     alt="Arathrox - Quái nhện đột biến với túi nọc độc điểm yếu" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Arathrox: Đột biến nhện phun nọc độc tầm xa, sở hữu túi độc phát sáng là điểm yếu chí mạng."
                                     data-i18n-en="Arathrox: Ranged venom-spitting spider mutant with glowing venom sac as its critical weak point.">
                                    Arathrox: Đột biến nhện phun nọc độc tầm xa, sở hữu túi độc phát sáng là điểm yếu chí mạng.
                                </div>
                            </div>
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/rope/rope-enemy-larvae.png" 
                                     alt="Crustaspikan Larvae - Quái vật cảm tử kích nổ" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Crustaspikan Larvae: Sinh vật cảm tử mang bom đếm ngược, truy đuổi áp sát với tốc độ cao."
                                     data-i18n-en="Crustaspikan Larvae: Suicide bomber rushing players with high-stress countdown explosive.">
                                    Crustaspikan Larvae: Sinh vật cảm tử mang bom đếm ngược, truy đuổi áp sát với tốc độ cao.
                                </div>
                            </div>
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/rope/rope-enemy-droid.png" 
                                     alt="Droid Oil - Người máy tuần tra an ninh vũ trang" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Droid Oil: Người máy an ninh mang súng năng lượng, chỉ bị vô hiệu hóa khi bắn chính xác vào đầu."
                                     data-i18n-en="Droid Oil: Armored security droid with energy rifle, vulnerable only to precision headshots.">
                                    Droid Oil: Người máy an ninh mang súng năng lượng, chỉ bị vô hiệu hóa khi bắn chính xác vào đầu.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Block 3: Quota Loop & Final Boss Encounter -->
                    <div class="editorial-block glass-panel">
                        <h2 class="text-gradient editorial-heading" 
                            data-i18n-vi="Vòng Lặp Nộp Quota & Đại Chiến Trùm Cuối"
                            data-i18n-en="Quota Extraction Loop & Boss Encounter">
                            Vòng Lặp Nộp Quota & Đại Chiến Trùm Cuối
                        </h2>
                        <div class="editorial-text-col editorial-text-full">
                            <p data-i18n-vi="<?php echo htmlspecialchars($project['boss_desc_vi']); ?>"
                               data-i18n-en="<?php echo htmlspecialchars($project['boss_desc_en']); ?>">
                                <?php echo htmlspecialchars($project['boss_desc_vi']); ?>
                            </p>
                        </div>
                        <div class="editorial-dual-images">
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/rope/rope-gameplay-patrol.png" 
                                     alt="Khu vực bốc dỡ phế liệu Quota" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Khu vực bốc dỡ hàng: Thu thập phế liệu kim loại và tìm thẻ Passcard dưới ánh đèn báo động đỏ để nộp đủ chỉ tiêu Quota."
                                     data-i18n-en="Loading Dock: Scavenging scrap metal and locating security Passcards under red alert lights to fulfill quotas.">
                                    Khu vực bốc dỡ hàng: Thu thập phế liệu kim loại và tìm thẻ Passcard dưới ánh đèn báo động đỏ để nộp đủ chỉ tiêu Quota.
                                </div>
                            </div>
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/rope/rope-boss-crustaspikan.png" 
                                     alt="Đại chiến Trùm Cuối Crustaspikan King" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Đại chiến Crustaspikan King: Trùm khổng lồ 2 giai đoạn với giáp vảy cứng cáp, kỹ năng đập đất chấn động và gầm thét cuồng nộ."
                                     data-i18n-en="Crustaspikan King: 2-phase colossal boss featuring armored carapace, seismic ground slams, and enraged roars.">
                                    Đại chiến Crustaspikan King: Trùm khổng lồ 2 giai đoạn với giáp vảy cứng cáp, kỹ năng đập đất chấn động và gầm thét cuồng nộ.
                                </div>
                            </div>
                        </div>
                    </div>
                <?php elseif (strcasecmp($project['slug'], 'death-mine') === 0): ?>
                    <!-- Block 1: Story & Setting -->
                    <div class="editorial-block glass-panel">
                        <h2 class="text-gradient editorial-heading" 
                            data-i18n-vi="Cốt Truyện & Bối Cảnh Hầm Mỏ Black Rock"
                            data-i18n-en="Narrative & Black Rock Mines Setting">
                            Cốt Truyện & Bối Cảnh Hầm Mỏ Black Rock
                        </h2>
                        <div class="editorial-grid-split">
                            <div class="editorial-text-col">
                                <p data-i18n-vi="<?php echo htmlspecialchars($project['story_desc_vi']); ?>"
                                   data-i18n-en="<?php echo htmlspecialchars($project['story_desc_en']); ?>">
                                    <?php echo htmlspecialchars($project['story_desc_vi']); ?>
                                </p>
                            </div>
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/dead-mine/dead-mine-story-164255.png" 
                                     alt="Hành lang hầm mỏ Black Rock sâu hun hút" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Khu mỏ Black Rock: Hành lang khai thác sâu với dầm gỗ chống và ánh đèn u tối sau cơn địa chấn kinh hoàng"
                                     data-i18n-en="Black Rock Mines: Deep extraction corridors reinforced by timber beams under eerie lantern glow">
                                    Khu mỏ Black Rock: Hành lang khai thác sâu với dầm gỗ chống và ánh đèn u tối sau cơn địa chấn kinh hoàng
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Block 2: Stealth Philosophy & Sound AI -->
                    <div class="editorial-block glass-panel">
                        <h2 class="text-gradient editorial-heading" 
                            data-i18n-vi="Triết Lý Lén Lút & Cơ Chế Sóng Âm 'Im Lặng Là Sống Sót'"
                            data-i18n-en="Stealth Philosophy & 'Silence is Survival' Auditory AI">
                            Triết Lý Lén Lút & Cơ Chế Sóng Âm 'Im Lặng Là Sống Sót'
                        </h2>
                        <div class="editorial-text-col editorial-text-full">
                            <p data-i18n-vi="<?php echo htmlspecialchars($project['gameplay_puzzles_desc_vi']); ?>"
                               data-i18n-en="<?php echo htmlspecialchars($project['gameplay_puzzles_desc_en']); ?>">
                                <?php echo htmlspecialchars($project['gameplay_puzzles_desc_vi']); ?>
                            </p>
                        </div>
                        <div class="editorial-dual-images">
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/dead-mine/dead-mine-arthur.png" 
                                     alt="Nhà khoa học Arthur Mills" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Arthur Mills: Nhà khoa học không trang bị vũ khí, hoàn toàn phụ thuộc vào di chuyển lén lút, quan sát và giải đố."
                                     data-i18n-en="Arthur Mills: Weaponless scientist reliant entirely on cautious sneaking, observation, and puzzle-solving.">
                                    Arthur Mills: Nhà khoa học không trang bị vũ khí, hoàn toàn phụ thuộc vào di chuyển lén lút, quan sát và giải đố.
                                </div>
                            </div>
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/dead-mine/dead-mine-monster.png" 
                                     alt="Mô hình 3D sinh vật săn mồi dị hình THỨ ĐÓ" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Sinh vật 'THỨ ĐÓ': Kẻ cai ngục mù lòa của khu mỏ, được điều hướng hoàn toàn bằng hệ thống thính giác siêu nhạy."
                                     data-i18n-en="The Creature 'IT': Blind warden of the subterranean shafts driven purely by hyper-sensitive acoustic hearing.">
                                    Sinh vật 'THỨ ĐÓ': Kẻ cai ngục mù lòa của khu mỏ, được điều hướng hoàn toàn bằng hệ thống thính giác siêu nhạy.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Block 3: Energy Cores & Climax Escape -->
                    <div class="editorial-block glass-panel">
                        <h2 class="text-gradient editorial-heading" 
                            data-i18n-vi="Hệ Thống 3 Lõi Năng Lượng & Leo Thang Độ Khó Thoát Hiểm"
                            data-i18n-en="3 Energy Cores System & Escalating Climax Escape">
                            Hệ Thống 3 Lõi Năng Lượng & Leo Thang Độ Khó Thoát Hiểm
                        </h2>
                        <div class="editorial-text-col editorial-text-full">
                            <p data-i18n-vi="<?php echo htmlspecialchars($project['boss_desc_vi']); ?>"
                               data-i18n-en="<?php echo htmlspecialchars($project['boss_desc_en']); ?>">
                                <?php echo htmlspecialchars($project['boss_desc_vi']); ?>
                            </p>
                        </div>
                        <div class="editorial-dual-images">
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/dead-mine/dead-mine-machinery.png" 
                                     alt="Phòng máy trạm điều khiển trung tâm" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Phòng máy trạm điều khiển: Khu vực tìm kiếm và nạp các Lõi Năng Lượng vào bảng điều khiển trung tâm để vận hành Thang máy B."
                                     data-i18n-en="Central Machinery Room: Locating and inserting Energy Cores into the primary terminal to initialize escape Elevator B.">
                                    Phòng máy trạm điều khiển: Khu vực tìm kiếm và nạp các Lõi Năng Lượng vào bảng điều khiển trung tâm để vận hành Thang máy B.
                                </div>
                            </div>
                            <div class="gallery-item editorial-media-card">
                                <img src="assets/images/projects/dead-mine/dead-mine-cart-puzzle.png" 
                                     alt="Kho xe mỏ" 
                                     class="gallery-img"
                                     loading="lazy">
                                <div class="editorial-media-caption"
                                     data-i18n-vi="Kho xe mỏ: Cần tìm kiếm mật mã trong các xe để mở gương."
                                     data-i18n-en="Mine Cart Depot: Search for hidden passcodes within the carts to unlock the mirror puzzle.">
                                    Kho xe mỏ: Cần tìm kiếm mật mã trong các xe để mở gương.
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <!-- Fallback standard overview for other projects -->
            <div class="glass-panel" style="padding: clamp(2.25rem, 4.5vw, 3.5rem); margin-bottom: 3.5rem;">
                <h2 class="text-gradient" style="font-size: 1.8rem; margin-bottom: 1.25rem;">Tổng Quan Dự Án</h2>
                <p style="font-size: 1.1rem; line-height: 1.8; margin-bottom: 2rem;"
                   data-i18n-vi="<?php echo htmlspecialchars($project['full_desc_vi']); ?>"
                   data-i18n-en="<?php echo htmlspecialchars($project['full_desc_en']); ?>">
                    <?php echo htmlspecialchars($project['full_desc_vi']); ?>
                </p>
            </div>
        <?php endif; ?>

        <!-- Section 3: Role & Technical Highlights (Dedicated Engineering Block) -->
        <div class="tech-section-block glass-panel">
            <div style="margin-bottom: 2rem;">
                <h2 class="text-gradient editorial-heading" 
                    data-i18n="projects.tech_title"
                    data-i18n-vi="Vai Trò & Đóng Góp Kỹ Thuật"
                    data-i18n-en="Role & Technical Engineering Contributions">
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
                <h3 class="highlights-heading"
                    data-i18n="projects.highlights_title"
                    data-i18n-vi="Điểm Nhấn Lập Trình Nổi Bật:"
                    data-i18n-en="Core Technical Highlights:">
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

        <!-- Section 4: Community Feature / Media Recognition (Nếu có) -->
        <?php if (!empty($project['community_feature'])): ?>
            <div class="community-feature-section">
                <div class="editorial-block glass-panel">
                    <div style="margin-bottom: 2rem;">
                        <h2 class="text-gradient editorial-heading"
                            data-i18n-vi="<?php echo htmlspecialchars($project['community_feature']['title_vi']); ?>"
                            data-i18n-en="<?php echo htmlspecialchars($project['community_feature']['title_en']); ?>">
                            <?php echo htmlspecialchars($project['community_feature']['title_vi']); ?>
                        </h2>
                        <p style="font-size: 1.08rem; line-height: 1.9; color: var(--text-secondary); max-width: 980px;"
                           data-i18n-vi="<?php echo htmlspecialchars($project['community_feature']['desc_vi']); ?>"
                           data-i18n-en="<?php echo htmlspecialchars($project['community_feature']['desc_en']); ?>">
                            <?php echo htmlspecialchars($project['community_feature']['desc_vi']); ?>
                        </p>
                    </div>

                    <div class="gallery-item editorial-media-card">
                        <img src="<?php echo htmlspecialchars($project['community_feature']['image']); ?>" 
                             alt="<?php echo htmlspecialchars($project['community_feature']['caption_vi']); ?>" 
                             class="gallery-img"
                             loading="lazy">
                        <div class="editorial-media-caption"
                             data-i18n-vi="<?php echo htmlspecialchars($project['community_feature']['caption_vi']); ?>"
                             data-i18n-en="<?php echo htmlspecialchars($project['community_feature']['caption_en']); ?>">
                            <?php echo htmlspecialchars($project['community_feature']['caption_vi']); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Section 6: Gallery (For other projects that don't have editorial blocks) -->
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
