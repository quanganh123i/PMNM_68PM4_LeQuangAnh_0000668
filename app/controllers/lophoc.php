<?php

class lophoc extends Controller
{
    public function index()
    {
        try {
            $lophocModel = $this->model('LophocModel');
            $lophocs = $lophocModel->getAll();

            $this->view('lophoc/index', [
                'title' => 'Danh sách lớp học',
                'lophocs' => $lophocs,
            ], 'layoutmaster');
        } catch (Throwable $e) {
            $this->view('lophoc/index', [
                'title' => 'Danh sách lớp học',
                'lophocs' => [],
                'error' => $e->getMessage(),
            ], 'layoutmaster');
        }
    }

    public function create()
    {
        $error = '';
        $old = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old = [
                'ma_lop' => trim($_POST['ma_lop'] ?? ''),
                'ten_lop' => trim($_POST['ten_lop'] ?? ''),
            ];

            if ($old['ma_lop'] === '' || $old['ten_lop'] === '') {
                $error = 'Mã lớp và Tên lớp là bắt buộc.';
            } else {
                try {
                    $lophocModel = $this->model('LophocModel');
                    $lophocModel->create([
                        'ma_lop' => $old['ma_lop'],
                        'ten_lop' => $old['ten_lop'],
                    ]);
                    header('Location: ' . BASE_URL . '/lophoc');
                    exit();
                } catch (PDOException $e) {
                    $error = str_contains($e->getMessage(), 'Duplicate')
                        ? 'Mã lớp đã tồn tại.'
                        : $e->getMessage();
                } catch (Throwable $e) {
                    $error = $e->getMessage();
                }
            }
        }

        $this->view('lophoc/create', [
            'title' => 'Thêm lớp học',
            'error' => $error,
            'old' => $old,
        ], 'layoutmaster');
    }

    public function edit($id)
    {
        $lophocModel = $this->model('LophocModel');
        $lophoc = $lophocModel->getById((int)$id);

        if (!$lophoc) {
            header('Location: ' . BASE_URL . '/lophoc');
            exit();
        }

        $error = '';
        $old = $lophoc;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old = [
                'ma_lop' => trim($_POST['ma_lop'] ?? ''),
                'ten_lop' => trim($_POST['ten_lop'] ?? ''),
            ];

            if ($old['ma_lop'] === '' || $old['ten_lop'] === '') {
                $error = 'Mã lớp và Tên lớp là bắt buộc.';
            } else {
                try {
                    $lophocModel->update((int)$id, [
                        'ma_lop' => $old['ma_lop'],
                        'ten_lop' => $old['ten_lop'],
                    ]);
                    header('Location: ' . BASE_URL . '/lophoc');
                    exit();
                } catch (PDOException $e) {
                    $error = str_contains($e->getMessage(), 'Duplicate')
                        ? 'Mã lớp đã tồn tại.'
                        : $e->getMessage();
                } catch (Throwable $e) {
                    $error = $e->getMessage();
                }
            }
        }

        $this->view('lophoc/edit', [
            'title' => 'Cập nhật lớp học',
            'error' => $error,
            'old' => $old,
            'id' => $id
        ], 'layoutmaster');
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $lophocModel = $this->model('LophocModel');
            $lophocModel->delete((int)$id);
        }
        header('Location: ' . BASE_URL . '/lophoc');
        exit();
    }
}
