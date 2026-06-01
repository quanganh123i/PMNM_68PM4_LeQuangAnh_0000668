<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB Test</title>
</head>
<body>
    <h1>Kiểm tra kết nối Database</h1>

    <?php if (isset($error)): ?>
        <p style="color:red;">Lỗi: <?= htmlspecialchars($error) ?></p>
        <p><a href="<?= BASE_URL ?>/dbtest/install">Cài đặt database</a></p>
    <?php else: ?>
        <p>Kết nối OK — Database: <strong><?= htmlspecialchars($db_name ?? DB_NAME) ?></strong></p>
        <p><a href="<?= BASE_URL ?>/dbtest/install">Cài đặt / cập nhật bảng</a> · <a href="<?= BASE_URL ?>/users">Danh sách users</a></p>
    <?php endif; ?>

</body>
</html>

