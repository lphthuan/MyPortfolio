<?php
/**
 * Thun Portfolio - Connection Verification & Setup Probe
 * Theme: Blue & Violet (Game Programmer Aesthetic)
 */
$phpVersion = phpversion();
$serverSoftware = $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown Server';
$serverTime = date('Y-m-d H:i:s T');
$hostDomain = $_SERVER['HTTP_HOST'] ?? 'lphthuan.id.vn';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thun Game Portfolio - CI/CD Active</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-base: #0a0b16;
            --bg-card: rgba(18, 20, 42, 0.75);
            --border-glow: rgba(124, 58, 237, 0.35);
            --accent-indigo: #6366f1;
            --accent-violet: #8b5cf6;
            --accent-cyan: #06b6d4;
            --accent-green: #10b981;
            --text-primary: #f8fafc;
            --text-muted: #94a3b8;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-base);
            background-image: 
                radial-gradient(ellipse 80% 80% at 50% -20%, rgba(99, 102, 241, 0.25), transparent),
                radial-gradient(circle at 80% 80%, rgba(139, 92, 246, 0.15), transparent);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .container {
            max-width: 680px;
            width: 100%;
            background: var(--bg-card);
            border: 1px solid var(--border-glow);
            border-radius: 20px;
            padding: 2.5rem;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5), 0 0 30px rgba(124, 58, 237, 0.2);
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--accent-cyan), var(--accent-indigo), var(--accent-violet));
        }

        .badge-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(16, 185, 129, 0.35);
            color: var(--accent-green);
            padding: 6px 14px;
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 1.5rem;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background-color: var(--accent-green);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--accent-green);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.85); }
        }

        h1 {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            margin-bottom: 0.75rem;
            background: linear-gradient(135deg, #ffffff 30%, #a78bfa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.desc {
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 2rem;
            font-size: 1.05rem;
        }

        .system-info {
            background: rgba(10, 11, 22, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 1.25rem;
            margin-bottom: 2rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.9rem;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: var(--text-muted);
        }

        .info-value {
            color: var(--accent-cyan);
            font-weight: 600;
        }

        .next-steps {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding-top: 1.5rem;
        }

        .next-steps h3 {
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
            color: #c4b5fd;
        }

        .next-steps ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .next-steps li {
            position: relative;
            padding-left: 24px;
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .next-steps li::before {
            content: '✦';
            position: absolute;
            left: 0;
            color: var(--accent-violet);
        }

        footer {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.85rem;
            color: rgba(148, 163, 184, 0.6);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="badge-status">
            <span class="pulse-dot"></span>
            CI/CD DEPLOYMENT VERIFIED
        </div>

        <h1>Game Portfolio</h1>
        <p class="desc">Website đã được thiết lập thành công trên hosting iNET thông qua quy trình tự động đồng bộ Git & GitHub Actions.</p>

        <div class="system-info">
            <div class="info-row">
                <span class="info-label">Domain:</span>
                <span class="info-value"><?php echo htmlspecialchars($hostDomain); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">PHP Engine:</span>
                <span class="info-value">v<?php echo htmlspecialchars($phpVersion); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Server Software:</span>
                <span class="info-value"><?php echo htmlspecialchars($serverSoftware); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Sync Timestamp:</span>
                <span class="info-value"><?php echo htmlspecialchars($serverTime); ?></span>
            </div>
        </div>

        <div class="next-steps">
            <h3>Các bước tiếp theo của dự án:</h3>
            <ul>
                <li>Hoàn thiện giao diện Trang Giới thiệu (Avatar glow, nút GitHub, Zalo, chi tiết liên hệ).</li>
                <li>Tích hợp công tắc Dark/Light Mode với hiệu ứng Sun & Moon.</li>
                <li>Hệ thống chuyển đổi song ngữ Anh - Việt (EN/VI).</li>
                <li>Xây dựng lưới bài báo dự án game & trang chi tiết (Video Trailer, Gameplay, Looping Mechanics).</li>
            </ul>
        </div>

        <footer>
            Thun Portfolio &bull; Built with PHP &amp; Vanilla Modern Web Stack
        </footer>
    </div>
</body>
</html>
