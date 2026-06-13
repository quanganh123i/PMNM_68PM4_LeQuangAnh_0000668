<?php

class LophocModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT id, ma_lop, ten_lop, created_at
             FROM lophoc
             ORDER BY ma_lop ASC'
        );

        return $stmt->fetchAll();
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO lophoc (ma_lop, ten_lop)
             VALUES (:ma_lop, :ten_lop)'
        );

        return $stmt->execute([
            'ma_lop' => $data['ma_lop'],
            'ten_lop' => $data['ten_lop'],
        ]);
    }

    public function getById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT id, ma_lop, ten_lop FROM lophoc WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE lophoc 
             SET ma_lop = :ma_lop, ten_lop = :ten_lop 
             WHERE id = :id'
        );

        return $stmt->execute([
            'id' => $id,
            'ma_lop' => $data['ma_lop'],
            'ten_lop' => $data['ten_lop'],
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM lophoc WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}
