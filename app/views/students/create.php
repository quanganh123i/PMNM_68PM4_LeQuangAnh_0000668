<p><a href="<?= BASE_URL ?>/students">← Danh sách sinh viên</a></p>

<?php if (!empty($error)): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST" action="<?= BASE_URL ?>/students/create" class="student-form">
    <p>
        <label for="ma_sv">Mã SV <span class="required">*</span></label><br>
        <input type="text" id="ma_sv" name="ma_sv" value="<?= htmlspecialchars($old['ma_sv'] ?? '') ?>" required maxlength="20">
    </p>
    <p>
        <label for="ho_ten">Họ tên <span class="required">*</span></label><br>
        <input type="text" id="ho_ten" name="ho_ten" value="<?= htmlspecialchars($old['ho_ten'] ?? '') ?>" required maxlength="100">
    </p>
    <p>
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" maxlength="100">
    </p>
    <p>
        <label for="lop">Lớp</label><br>
        <input type="text" id="lop" name="lop" value="<?= htmlspecialchars($old['lop'] ?? '') ?>" maxlength="50">
    </p>
    <p>
        <button type="submit">Lưu sinh viên</button>
        <a href="<?= BASE_URL ?>/students">Hủy</a>
    </p>
</form>
