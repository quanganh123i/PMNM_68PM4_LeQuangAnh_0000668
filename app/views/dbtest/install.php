<?php if (!empty($success)): ?>
    <p style="color:green;">Đã tạo database <strong><?= htmlspecialchars($db_name) ?></strong>, bảng <code>users</code>, <code>students</code> (dữ liệu mẫu) và tài khoản <strong>admin / 123456</strong>.</p>
    <p><a href="<?= BASE_URL ?>/auth/login">Đăng nhập</a> · <a href="<?= BASE_URL ?>/students">Danh sách sinh viên</a> · <a href="<?= BASE_URL ?>/users">Xem users</a></p>
<?php else: ?>
    <p class="error">Lỗi: <?= htmlspecialchars($error ?? 'Không xác định') ?></p>
    <p>Kiểm tra XAMPP: MySQL đã Start, user <?= htmlspecialchars(DB_USER) ?> có quyền tạo DB.</p>
<?php endif; ?>
