<p><a href="<?= BASE_URL ?>/students/create">+ Thêm sinh viên</a></p>

<?php if (!empty($error)): ?>
    <p class="error">Lỗi DB: <?= htmlspecialchars($error) ?></p>
    <p>Chưa có bảng sinh viên? Mở <a href="<?= BASE_URL ?>/dbtest/install">Cài đặt database</a></p>
<?php elseif (empty($students)): ?>
    <p>Chưa có sinh viên. <a href="<?= BASE_URL ?>/dbtest/install">Cài đặt database</a> để tạo bảng và dữ liệu mẫu.</p>
<?php else: ?>
    <p><strong>Tổng số:</strong> <?= (int) ($total ?? count($students)) ?> sinh viên</p>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã SV</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Lớp</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $i => $sv): ?>
            <tr>
                <td><?= ($page - 1) * 5 + $i + 1 ?></td>
                <td><?= htmlspecialchars($sv['ma_sv']) ?></td>
                <td><?= htmlspecialchars($sv['ho_ten']) ?></td>
                <td><?= htmlspecialchars($sv['email'] ?? '') ?></td>
                <td><?= htmlspecialchars($sv['lop'] ?? '') ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="<?= BASE_URL ?>/students?page=<?= $i ?>" <?= $i == $page ? 'style="font-weight:bold"' : '' ?>>
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
