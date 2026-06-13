<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini Workshop Portal</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<nav class="navbar">
    <strong style="color: var(--primary); margin-right: auto;">Workshop Portal 🚀</strong>
    <a href="/">Home</a>
    <a href="/workshop">Danh sách đăng ký</a>
    <a href="/workshop/register">Đăng ký workshop</a>
    <a href="/dashboard">Dashboard</a>
    <?php if (is_logged_in()): ?>
        <form method="post" action="/logout" class="inline-form">
            <button type="submit" class="link-button">Logout</button>
        </form>
    <?php else: ?>
        <a href="/login" style="color: var(--primary)">Login</a>
    <?php endif; ?>
</nav>

<main class="container">
    <?php if ($success = flash_get('success')): ?>
        <div class="alert success"><?= h($success) ?></div>
    <?php endif; ?>

    <?php if ($error = flash_get('error')): ?>
        <div class="alert error"><?= h($error) ?></div>
    <?php endif; ?>

    <?php
    if (isset($view) && $view) {
        require view_path($view);
    } else {
        echo '<p>View not set.</p>';
    }
    ?>
</main>
</body>
</html>