<?php
/**
 * Thun Game Portfolio - Global Footer
 */
?>
    <!-- Global Site Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div>
                    <a href="index.php" class="brand-logo" style="margin-bottom: 0.5rem; display: inline-flex;">
                        <span>THUN<span class="dot">.DEV</span></span>
                    </a>
                    <p class="footer-quote" data-i18n="footer.quote">
                        Biến ý tưởng sáng tạo thành những trải nghiệm tương tác đỉnh cao.
                    </p>
                </div>

                <div class="footer-links">
                    <a href="https://github.com/lphthuan" target="_blank" rel="noopener noreferrer" class="nav-link" aria-label="GitHub Profile">
                        GitHub
                    </a>
                    <a href="https://zalo.me/0389893210" target="_blank" rel="noopener noreferrer" class="nav-link" aria-label="Zalo Chat">
                        Zalo
                    </a>
                    <a href="mailto:lphthuan@gmail.com" class="nav-link" aria-label="Email Me">
                        Email
                    </a>
                    <a href="projects.php" class="nav-link" data-i18n="nav.projects">
                        Dự án Game
                    </a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>
                    &copy; <?php echo date('Y'); ?> <strong>Lê Phan Hoà Thuận (Thun)</strong>. <span data-i18n="footer.rights">Bảo lưu mọi quyền.</span>
                </p>
            </div>
        </div>
    </footer>

    <!-- Core Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/i18n.js"></script>
    <?php if (isset($extraScripts) && is_array($extraScripts)): ?>
        <?php foreach ($extraScripts as $script): ?>
            <script src="<?php echo htmlspecialchars($script); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
