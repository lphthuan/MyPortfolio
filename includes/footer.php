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
                        <span>lphThuan<span class="dot">.dev</span></span>
                    </a>
                    <p class="footer-quote" data-i18n="footer.quote">
                        Biến ý tưởng sáng tạo thành những trải nghiệm tương tác đỉnh cao.
                    </p>
                </div>

                <div class="footer-links">
                    <a href="https://github.com/lphthuan" target="_blank" rel="noopener noreferrer" class="nav-link" aria-label="GitHub Profile">
                        GitHub
                    </a>
                    <a href="https://zalo.me/0898333096" target="_blank" rel="noopener noreferrer" class="nav-link" aria-label="Zalo Chat">
                        Zalo
                    </a>
                    <a href="mailto:lephanhoathuan2006@gmail.com" class="nav-link" aria-label="Email Me">
                        Email
                    </a>
                </div>
            </div>

            <div class="footer-bottom">
                <p>
                    &copy; <?php echo date('Y'); ?> <strong>Lê Phan Hòa Thuận</strong>. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Core Scripts -->
    <script src="assets/js/main.js?v=2.5"></script>
    <script src="assets/js/i18n.js?v=2.5"></script>
    <?php if (isset($extraScripts) && is_array($extraScripts)): ?>
        <?php foreach ($extraScripts as $script): ?>
            <script src="<?php echo htmlspecialchars($script); ?>?v=2.5"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
