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
}
