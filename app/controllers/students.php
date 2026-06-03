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
}
