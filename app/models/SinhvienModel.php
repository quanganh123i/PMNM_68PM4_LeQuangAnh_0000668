<?php

class SinhvienModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT id, ma_sv, ho_ten, email, lop, created_at
             FROM students
             ORDER BY ma_sv ASC'
        );

        return $stmt->fetchAll();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO students (ma_sv, ho_ten, email, lop)
             VALUES (:ma_sv, :ho_ten, :email, :lop)'
        );

        return $stmt->execute([
            'ma_sv' => $data['ma_sv'],
            'ho_ten' => $data['ho_ten'],
            'email' => $data['email'] ?? null,
            'lop' => $data['lop'] ?? null,
        ]);
    }
}
