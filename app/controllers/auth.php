<?php

class auth extends Controller
{
    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            try {
                $userModel = $this->model('User');
                if ($userModel->verifyLogin($username, $password)) {
                    $_SESSION['username'] = $username;
                    header('Location: ' . BASE_URL . '/home/index');
                    exit();
                }
                $error = 'Sai tên đăng nhập hoặc mật khẩu!';
            } catch (Throwable $e) {
                $error = 'Không kết nối được database. Mở ' . BASE_URL . '/dbtest/install để cài đặt.';
            }
        }
        $this->view('auth/login', ['title' => 'Đăng nhập', 'error' => $error]);
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL . '/auth/login');
        exit();
    }
}
