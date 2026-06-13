<h1>Đăng nhập</h1>
<p>Tài khoản demo: <strong style="color:var(--primary)">user@example.com</strong> | <strong style="color:var(--primary)">123456</strong></p>

<form method="post" action="/login" class="card" style="max-width: 450px; margin: 2rem auto;">
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="<?= h($old['email'] ?? '') ?>">
        <?php if (!empty($errors['email'])): ?><div class="error-text"><?= h($errors['email']) ?></div><?php endif; ?>
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password">
        <?php if (!empty($errors['password'])): ?><div class="error-text"><?= h($errors['password']) ?></div><?php endif; ?>
    </div>

    <div class="form-group remember-group">
        <label class="checkbox-label">
            <input type="checkbox" name="remember"> 
            <span>Ghi nhớ đăng nhập</span>
        </label>
    </div>

    <button type="submit" class="btn primary" style="width: 100%;">Đăng nhập</button>
</form>