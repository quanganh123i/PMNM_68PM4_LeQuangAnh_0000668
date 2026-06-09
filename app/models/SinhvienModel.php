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

    public function countAll(): int
    {
        $stmt = $this->db->query('SELECT COUNT(*) FROM students');
        return (int) $stmt->fetchColumn();
    }

    public function getPaginated(int $limit, int $offset): array
    {
        $stmt = $this->db->prepare(
            'SELECT id, ma_sv, ho_ten, email, lop, created_at
             FROM students
             ORDER BY ma_sv ASC
             LIMIT :limit OFFSET :offset'
        );
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
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
