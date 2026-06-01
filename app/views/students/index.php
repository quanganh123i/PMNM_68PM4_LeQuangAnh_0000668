<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Sinh viên') ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 16px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f5f5f5; }
        .error { color: #c00; }
        a { color: #1976d2; }
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($title ?? 'Sinh viên') ?></h1>
    <p><a href="<?= BASE_URL ?>/home">← Trang chủ</a></p>

    <?php if (!empty($error)): ?>
        <p class="error">Lỗi DB: <?= htmlspecialchars($error) ?></p>
        <p>Chưa có bảng sinh viên? Mở <a href="<?= BASE_URL ?>/dbtest/install">Cài đặt database</a></p>
    <?php elseif (empty($students)): ?>
        <p>Chưa có sinh viên. <a href="<?= BASE_URL ?>/dbtest/install">Cài đặt database</a> để tạo bảng và dữ liệu mẫu.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã SV</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Lớp</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $sv): ?>
                <tr>
                    <td><?= (int) $sv['id'] ?></td>
                    <td><?= htmlspecialchars($sv['ma_sv']) ?></td>
                    <td><?= htmlspecialchars($sv['ho_ten']) ?></td>
                    <td><?= htmlspecialchars($sv['email'] ?? '') ?></td>
                    <td><?= htmlspecialchars($sv['lop'] ?? '') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
