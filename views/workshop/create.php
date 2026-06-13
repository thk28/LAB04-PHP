<h1>Đăng ký tham gia Workshop</h1>
<p>Điền đầy đủ thông tin vào form dưới đây để giữ chỗ tham dự.</p>

<?php if (!empty($errors['_global'])): ?>
    <div class="alert error"><?= h($errors['_global']) ?></div>
<?php endif; ?>

<form method="post" action="/workshop/register" class="card">
    <div class="form-group">
        <label>Họ và Tên</label>
        <input type="text" name="fullname" value="<?= h($old['fullname'] ?? '') ?>" placeholder="Nguyễn Văn A">
        <?php if (!empty($errors['fullname'])): ?><div class="error-text"><?= h($errors['fullname']) ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label>Địa chỉ Email</label>
        <input type="text" name="email" value="<?= h($old['email'] ?? '') ?>" placeholder="example@domain.com">
        <?php if (!empty($errors['email'])): ?><div class="error-text"><?= h($errors['email']) ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label>Số điện thoại</label>
        <input type="text" name="phone" value="<?= h($old['phone'] ?? '') ?>" placeholder="0912345678">
        <?php if (!empty($errors['phone'])): ?><div class="error-text"><?= h($errors['phone']) ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label>Chủ đề Workshop quan tâm</label>
        <select name="topic">
            <option value="">-- Chọn chủ đề --</option>
            <option value="ai-trends" <?= (($old['topic'] ?? '') === 'ai-trends') ? 'selected' : '' ?>>Xu hướng trí tuệ nhân tạo (AI Trends 2026)</option>
            <option value="secure-php" <?= (($old['topic'] ?? '') === 'secure-php') ? 'selected' : '' ?>>Lập trình Web PHP An Toàn & Bảo Mật</option>
            <option value="uiux-design" <?= (($old['topic'] ?? '') === 'uiux-design') ? 'selected' : '' ?>>Thiết kế trải nghiệm người dùng UI/UX nâng cao</option>
        </select>
        <?php if (!empty($errors['topic'])): ?><div class="error-text"><?= h($errors['topic']) ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label>Ghi chú thêm (Nếu có)</label>
        <textarea name="note" rows="3" placeholder="Câu hỏi bạn muốn đặt cho diễn giả..."><?= h($old['note'] ?? '') ?></textarea>
    </div>

    <div class="honeypot">
        <label>Biệt danh hệ thống</label>
        <input type="text" name="nickname" tabindex="-1" autocomplete="off">
    </div>

    <button type="submit" class="btn primary">Gửi thông tin đăng ký</button>
    <a href="/workshop" class="btn secondary">Hủy bỏ</a>
</form>