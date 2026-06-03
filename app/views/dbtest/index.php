<?php if (isset($error)): ?>
    <p class="error">Lỗi: <?= htmlspecialchars($error) ?></p>
    <p><a href="<?= BASE_URL ?>/dbtest/install">Cài đặt database</a></p>
<?php else: ?>
    <p>Kết nối OK — Database: <strong><?= htmlspecialchars($db_name ?? DB_NAME) ?></strong></p>
    <p><a href="<?= BASE_URL ?>/dbtest/install">Cài đặt / cập nhật bảng</a> · <a href="<?= BASE_URL ?>/users">Danh sách users</a></p>
<?php endif; ?>
