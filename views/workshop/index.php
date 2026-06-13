<h1>Danh sách thành viên đăng ký Workshop</h1>
<p style="margin-bottom: 1.5rem;"><a href="/workshop/register" class="btn primary">+ Thêm đăng ký mới</a></p>

<table class="table">
    <thead>
        <tr>
            <th>Mã Số</th>
            <th>Họ và Tên</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Chủ đề lựa chọn</th>
            <th>Thời gian đăng ký</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($registrations)): ?>
            <tr><td colspan="6" style="text-align: center; color: gray;">Chưa có ai đăng ký tham gia.</td></tr>
        <?php else: ?>
            <?php foreach ($registrations as $reg): ?>
                <tr>
                    <td><strong><?= h($reg['id']) ?></strong></td>
                    <td><?= h($reg['fullname']) ?></td>
                    <td><?= h($reg['email']) ?></td>
                    <td><?= h($reg['phone']) ?></td>
                    <td>
                        <?php 
                            if ($reg['topic'] === 'ai-trends') echo 'AI Trends 2026';
                            elseif ($reg['topic'] === 'secure-php') echo 'Secure PHP Development';
                            elseif ($reg['topic'] === 'uiux-design') echo 'UI/UX Design';
                            else echo h($reg['topic']);
                        ?>
                    </td>
                    <td><?= h($reg['registered_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>