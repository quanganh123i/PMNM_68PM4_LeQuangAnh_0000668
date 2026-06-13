<p><a href="<?= BASE_URL ?>/lophoc/create">+ Thêm lớp học</a></p>

<?php if (!empty($error)): ?>
    <p class="error">Lỗi DB: <?= htmlspecialchars($error) ?></p>
<?php elseif (empty($lophocs)): ?>
    <p>Chưa có lớp học.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lophocs as $i => $lh): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= htmlspecialchars($lh['ma_lop']) ?></td>
                <td><?= htmlspecialchars($lh['ten_lop']) ?></td>
                <td>
                    <a href="<?= BASE_URL ?>/lophoc/edit/<?= $lh['id'] ?>">Sửa</a>
                    <form action="<?= BASE_URL ?>/lophoc/delete/<?= $lh['id'] ?>" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
