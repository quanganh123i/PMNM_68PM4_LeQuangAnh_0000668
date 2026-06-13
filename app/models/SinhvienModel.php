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
            'SELECT s.id, s.ma_sv, s.ho_ten, s.email, s.lop_id, l.ten_lop, s.created_at
             FROM students s
             LEFT JOIN lophoc l ON s.lop_id = l.id
             ORDER BY s.ma_sv ASC'
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
            'SELECT s.id, s.ma_sv, s.ho_ten, s.email, s.lop_id, l.ten_lop, s.created_at
             FROM students s
             LEFT JOIN lophoc l ON s.lop_id = l.id
             ORDER BY s.ma_sv ASC
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
            'INSERT INTO students (ma_sv, ho_ten, email, lop_id)
             VALUES (:ma_sv, :ho_ten, :email, :lop_id)'
        );

        return $stmt->execute([
            'ma_sv' => $data['ma_sv'],
            'ho_ten' => $data['ho_ten'],
            'email' => $data['email'] ?? null,
            'lop_id' => $data['lop_id'] ?? null,
        ]);
    }

    public function getById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT id, ma_sv, ho_ten, email, lop_id FROM students WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE students 
             SET ma_sv = :ma_sv, ho_ten = :ho_ten, email = :email, lop_id = :lop_id 
             WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'ma_sv' => $data['ma_sv'],
            'ho_ten' => $data['ho_ten'],
            'email' => $data['email'] ?? null,
            'lop_id' => $data['lop_id'] ?? null,
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM students WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
