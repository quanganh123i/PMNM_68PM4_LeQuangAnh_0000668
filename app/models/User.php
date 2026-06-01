<?php

class User
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findByUsername(string $username): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
        $stmt->execute(['username' => $username]);
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public function verifyLogin(string $username, string $password): bool
    {
        $user = $this->findByUsername($username);
        if (!$user) {
            return false;
        }

        return password_verify($password, $user['password']);
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT id, username, created_at FROM users ORDER BY id ASC');

        return $stmt->fetchAll();
    }
}
