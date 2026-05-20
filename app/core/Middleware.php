<?php

class Middleware
{
    public function checkLogin()
    {
        // Các trang không cần đăng nhập
        $publicPages = ['/auth/login', '/auth/logout'];

        $url = '/' . trim($_GET['url'] ?? '', '/');

        if (!isset($_SESSION['username']) && !in_array($url, $publicPages)) {
            header('Location: /auth/login');
            exit();
        }
    }
}
