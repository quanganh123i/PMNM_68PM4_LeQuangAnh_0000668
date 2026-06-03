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
