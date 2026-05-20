<?php

class auth extends Controller
{
    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Kiểm tra tài khoản (có thể thay bằng query database)
            if ($username === 'admin' && $password === '123456') {
                $_SESSION['username'] = $username;
                header('Location: /home/index');
                exit();
            } else {
                $error = 'Sai tên đăng nhập hoặc mật khẩu!';
            }
        }
        $this->view('auth/login', ['title' => 'Đăng nhập', 'error' => $error]);
    }

    public function logout()
    {
        session_destroy();
        header('Location: /auth/login');
        exit();
    }
}
