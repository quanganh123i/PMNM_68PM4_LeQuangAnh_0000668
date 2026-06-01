<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Users') ?></title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 720px; margin: 40px auto; padding: 0 16px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f5f5f5; }
        .error { color: #c00; }
        a { color: #1976d2; }
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($title ?? 'Users') ?></h1>
    <p><a href="<?= BASE_URL ?>/home">← Trang chủ</a></p>

    <?php if (!empty($error)): ?>
        <p class="error">Lỗi DB: <?= htmlspecialchars($error) ?></p>
        <p>Chưa có database? Mở <a href="<?= BASE_URL ?>/dbtest/install">Cài đặt database</a></p>
    <?php elseif (empty($users)): ?>
        <p>Chưa có dữ liệu. <a href="<?= BASE_URL ?>/dbtest/install">Cài đặt database</a></p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Ngày tạo</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= (int) $u['id'] ?></td>
                    <td><?= htmlspecialchars($u['username']) ?></td>
                    <td><?= htmlspecialchars($u['created_at'] ?? '') ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
