<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cài đặt Database</title>
</head>
<body>
    <h1>Cài đặt Database</h1>

    <?php if (!empty($success)): ?>
        <p style="color:green;">Đã tạo database <strong><?= htmlspecialchars($db_name) ?></strong>, bảng <code>users</code>, <code>students</code> (dữ liệu mẫu) và tài khoản <strong>admin / 123456</strong>.</p>
        <p><a href="<?= BASE_URL ?>/auth/login">Đăng nhập</a> · <a href="<?= BASE_URL ?>/students">Danh sách sinh viên</a> · <a href="<?= BASE_URL ?>/users">Xem users</a></p>
    <?php else: ?>
        <p style="color:red;">Lỗi: <?= htmlspecialchars($error ?? 'Không xác định') ?></p>
        <p>Kiểm tra XAMPP: MySQL đã Start, user <?= htmlspecialchars(DB_USER) ?> có quyền tạo DB.</p>
    <?php endif; ?>
</body>
</html>
