<?php

class students extends Controller
{
    public function index()
    {
        try {
            $sinhVienModel = $this->model('SinhvienModel');
            $students = $sinhVienModel->getAll();

            $this->view('students/index', [
                'title' => 'Danh sách sinh viên',
                'students' => $students,
                'total' => count($students),
            ], 'layoutmaster');
        } catch (Throwable $e) {
            $this->view('students/index', [
                'title' => 'Danh sách sinh viên',
                'students' => [],
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
                'ma_sv' => trim($_POST['ma_sv'] ?? ''),
                'ho_ten' => trim($_POST['ho_ten'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'lop' => trim($_POST['lop'] ?? ''),
            ];

            if ($old['ma_sv'] === '' || $old['ho_ten'] === '') {
                $error = 'Mã SV và Họ tên là bắt buộc.';
            } else {
                try {
                    $sinhVienModel = $this->model('SinhvienModel');
                    $sinhVienModel->create([
                        'ma_sv' => $old['ma_sv'],
                        'ho_ten' => $old['ho_ten'],
                        'email' => $old['email'] !== '' ? $old['email'] : null,
                        'lop' => $old['lop'] !== '' ? $old['lop'] : null,
                    ]);
                    header('Location: ' . BASE_URL . '/students');
                    exit();
                } catch (PDOException $e) {
                    $error = str_contains($e->getMessage(), 'Duplicate')
                        ? 'Mã sinh viên đã tồn tại.'
                        : $e->getMessage();
                } catch (Throwable $e) {
                    $error = $e->getMessage();
                }
            }
        }

        $this->view('students/create', [
            'title' => 'Thêm sinh viên',
            'error' => $error,
            'old' => $old,
        ], 'layoutmaster');
    }
}
