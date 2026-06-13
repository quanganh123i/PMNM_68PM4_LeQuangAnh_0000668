<p><a href="<?= BASE_URL ?>/lophoc">← Danh sách lớp học</a></p>

<?php if (!empty($error)): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" action="<?= BASE_URL ?>/lophoc/create">
    <p>
        <label for="ma_lop">Mã lớp <span class="required">*</span></label><br>
        <input type="text" id="ma_lop" name="ma_lop" value="<?= htmlspecialchars($old['ma_lop'] ?? '') ?>" required maxlength="20">
    </p>
    <p>
        <label for="ten_lop">Tên lớp <span class="required">*</span></label><br>
        <input type="text" id="ten_lop" name="ten_lop" value="<?= htmlspecialchars($old['ten_lop'] ?? '') ?>" required maxlength="100">
    </p>
    <p>
        <button type="submit">Lưu lớp học</button>
        <a href="<?= BASE_URL ?>/lophoc">Hủy</a>
    </p>
</form>
