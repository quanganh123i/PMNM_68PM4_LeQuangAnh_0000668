<?php

class students extends Controller
{
    public function index()
    {
        try {
            $studentModel = $this->model('Student');
            $students = $studentModel->getAll();

            $this->view('students/index', [
                'title' => 'Danh sách sinh viên',
                'students' => $students,
            ]);
        } catch (Throwable $e) {
            $this->view('students/index', [
                'title' => 'Danh sách sinh viên',
                'students' => [],
                'error' => $e->getMessage(),
            ]);
        }
    }
}
