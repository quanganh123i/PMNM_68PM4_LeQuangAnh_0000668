<?php

class Middleware
{
    public function checkLogin()
    {
        // Các trang không cần đăng nhập
        $publicPages = ['/auth/login', '/auth/logout', '/dbtest', '/dbtest/index', '/dbtest/install'];

        $url = '/' . trim($_GET['url'] ?? '', '/');

        if (!isset($_SESSION['username']) && !in_array($url, $publicPages)) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit();
        }
    }
}
