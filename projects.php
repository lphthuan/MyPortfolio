<?php
/**
 * Thun Game Portfolio - Projects Showcase Page
 */
$pageTitle = "Dự Án // lphThuan.dev";
$activeNav = "projects";

$projectsJson = file_get_contents(__DIR__ . '/data/projects.json');
$projects = json_decode($projectsJson, true) ?? [];

require_once __DIR__ . '/includes/header.php';
?>

<main style="padding: 4rem 0 6rem;">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header" style="margin-bottom: 3.5rem;">
            <h1 class="section-title">
                <span class="text-gradient" data-i18n="projects.title">Dự Án</span>
            </h1>
        </div>

        <!-- Projects Grid (Dạng bài báo game) -->
        <div class="projects-editorial-grid" id="projects-grid">
            <?php foreach ($projects as $proj): ?>
                <article class="glass-panel project-card" data-category="<?php echo htmlspecialchars($proj['category']); ?>">
                    <div class="project-thumb-wrap">
                        <img src="<?php echo htmlspecialchars($proj['thumbnail']); ?>" 
                             alt="<?php echo htmlspecialchars($proj['title_vi']); ?>" 
                             class="project-thumb-img" 
                             loading="lazy">
                    </div>

                    <div class="project-body">
                        <div class="project-tags">
                            <?php foreach ($proj['tags'] as $tag): ?>
                                <span class="badge" style="background: rgba(99, 102, 241, 0.1); color: var(--accent-cyan);">
                                    #<?php echo htmlspecialchars($tag); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <h2 class="project-title" 
                            data-i18n-vi="<?php echo htmlspecialchars($proj['title_vi']); ?>"
                            data-i18n-en="<?php echo htmlspecialchars($proj['title_en']); ?>">
                            <?php echo htmlspecialchars($proj['title_vi']); ?>
                        </h2>

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
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
