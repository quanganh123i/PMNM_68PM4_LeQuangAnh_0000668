<header class="site-header">
    <h1><?= htmlspecialchars($title ?? 'MVC PHP') ?></h1>
    <p>Xin chào, <strong><?= htmlspecialchars($_SESSION['username'] ?? 'Guest') ?></strong></p>
    <nav class="site-nav">
        <a href="<?= BASE_URL ?>/home">Trang chủ</a>
        <a href="<?= BASE_URL ?>/students">Danh sách sinh viên</a>
        <a href="<?= BASE_URL ?>/lophoc">Danh sách lớp học</a>
        <a href="<?= BASE_URL ?>/users">Danh sách users (DB)</a>
        <a href="<?= BASE_URL ?>/dbtest">Kiểm tra DB</a>
        <a href="<?= BASE_URL ?>/auth/logout">Đăng xuất</a>
    </nav>
</header>
