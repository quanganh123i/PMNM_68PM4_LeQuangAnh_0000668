<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'MVC PHP') ?></title>
</head>
<body>
    <h1><?= htmlspecialchars($title ?? 'MVC PHP') ?></h1>
    <p>Xin chào, <strong><?= htmlspecialchars($_SESSION['username'] ?? 'Guest') ?></strong></p>
    <p><a href="/auth/logout">Đăng xuất</a></p>
</body>
</html>
