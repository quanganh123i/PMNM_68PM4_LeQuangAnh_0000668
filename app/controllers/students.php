<?php

class students extends Controller
{
    public function index()
    {
        try {
            $sinhVienModel = $this->model('SinhvienModel');
            
            $search = $_GET['search'] ?? null;
            $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
            if ($limit < 1) $limit = 5;
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            if ($page < 1) $page = 1;
            $offset = ($page - 1) * $limit;
            
            $total = $sinhVienModel->countAll($search);
            $students = $sinhVienModel->getPaginated($limit, $offset, $search);
            $totalPages = ceil($total / $limit);

            $this->view('students/index', [
                'title' => 'Danh sách sinh viên',
                'students' => $students,
                'total' => $total,
                'page' => $page,
                'totalPages' => $totalPages,
                'search' => $search,
                'limit' => $limit,
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
                'lop_id' => trim($_POST['lop_id'] ?? ''),
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
                        'lop_id' => $old['lop_id'] !== '' ? (int)$old['lop_id'] : null,
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

        $lophocModel = $this->model('LophocModel');
        $lophocs = $lophocModel->getAll();

        $this->view('students/create', [
            'title' => 'Thêm sinh viên',
            'error' => $error,
            'old' => $old,
            'lophocs' => $lophocs,
        ], 'layoutmaster');
    }

    public function edit($id)
    {
        $sinhVienModel = $this->model('SinhvienModel');
        $student = $sinhVienModel->getById((int)$id);

        if (!$student) {
            header('Location: ' . BASE_URL . '/students');
            exit();
        }

        $error = '';
        $old = $student;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $old = [
                'ma_sv' => trim($_POST['ma_sv'] ?? ''),
                'ho_ten' => trim($_POST['ho_ten'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'lop_id' => trim($_POST['lop_id'] ?? ''),
            ];

            if ($old['ma_sv'] === '' || $old['ho_ten'] === '') {
                $error = 'Mã SV và Họ tên là bắt buộc.';
            } else {
                try {
                    $sinhVienModel->update((int)$id, [
                        'ma_sv' => $old['ma_sv'],
                        'ho_ten' => $old['ho_ten'],
                        'email' => $old['email'] !== '' ? $old['email'] : null,
                        'lop_id' => $old['lop_id'] !== '' ? (int)$old['lop_id'] : null,
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

        $lophocModel = $this->model('LophocModel');
        $lophocs = $lophocModel->getAll();

        $this->view('students/edit', [
            'title' => 'Cập nhật sinh viên',
            'error' => $error,
            'old' => $old,
            'id' => $id,
            'lophocs' => $lophocs,
        ], 'layoutmaster');
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sinhVienModel = $this->model('SinhvienModel');
            $sinhVienModel->delete((int)$id);
        }
        header('Location: ' . BASE_URL . '/students');
        exit();
    }
}
