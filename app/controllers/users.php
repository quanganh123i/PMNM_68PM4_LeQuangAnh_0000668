<?php

class users extends Controller
{
    public function index()
    {
        try {
            $userModel = $this->model('User');
            $users = $userModel->getAll();

            $this->view('users/index', [
                'title' => 'Danh sách người dùng',
                'users' => $users,
            ]);
        } catch (Throwable $e) {
            $this->view('users/index', [
                'title' => 'Danh sách người dùng',
                'users' => [],
                'error' => $e->getMessage(),
            ]);
        }
    }
}
