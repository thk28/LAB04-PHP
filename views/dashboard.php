<h1>Dashboard</h1>

<div class="card">
    <h3>Xin chào quay trở lại, <?= h($_SESSION['user_name']) ?>!</h3>
    <p>Vai trò quản trị: <span class="alert success" style="padding: 0.2rem 0.5rem; font-size: 0.85rem;"><?= h($_SESSION['role']) ?></span></p>
    <hr style="border: 0; border-top: 1px solid #e2e8f0; margin: 1.5rem 0;">
    <p>⏰ Thời gian bắt đầu phiên: <strong><?= date('Y-m-d H:i:s', $_SESSION['login_at']) ?></strong></p>
    <p>🔄 Hoạt động cuối cùng ghi nhận: <strong><?= date('Y-m-d H:i:s', $_SESSION['last_activity_at']) ?></strong></p>
    <p style="margin-top: 2rem;">
        <a href="/session-debug" target="_blank" class="btn secondary">🔍 Kiểm tra dữ liệu Session Debug (JSON)</a>
    </p>
</div>