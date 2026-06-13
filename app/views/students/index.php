<p><a href="<?= BASE_URL ?>/students/create">+ Thêm sinh viên</a></p>

<form action="<?= BASE_URL ?>/students" method="GET" style="margin-bottom: 15px;">
    <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>" placeholder="Tìm theo MSSV, tên, lớp...">
    <select name="limit">
        <option value="5" <?= $limit == 5 ? 'selected' : '' ?>>5</option>
        <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10</option>
        <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20</option>
    </select>
    <button type="submit">Tìm kiếm</button>
    <?php if (!empty($search)): ?>
        <a href="<?= BASE_URL ?>/students">Hủy</a>
    <?php endif; ?>
</form>

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
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $i => $sv): ?>
            <tr>
                <td><?= ($page - 1) * $limit + $i + 1 ?></td>
                <td><?= htmlspecialchars($sv['ma_sv']) ?></td>
                <td><?= htmlspecialchars($sv['ho_ten']) ?></td>
                <td><?= htmlspecialchars($sv['email'] ?? '') ?></td>
                <td><?= htmlspecialchars($sv['ten_lop'] ?? '') ?></td>
                <td>
                    <a href="<?= BASE_URL ?>/students/edit/<?= $sv['id'] ?>">Sửa</a>
                    <form action="<?= BASE_URL ?>/students/delete/<?= $sv['id'] ?>" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php 
                $query = [];
                if ($search) $query['search'] = $search;
                if ($limit) $query['limit'] = $limit;
                $queryString = !empty($query) ? '&' . http_build_query($query) : '';
            ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="<?= BASE_URL ?>/students?page=<?= $i ?><?= $queryString ?>" <?= $i == $page ? 'style="font-weight:bold"' : '' ?>>
                    <?= $i ?>
                </a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>
