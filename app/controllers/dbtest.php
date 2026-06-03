<?php

class dbtest extends Controller
{
    public function index()
    {
        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->query('SELECT DATABASE() AS db_name, 1 AS ok');
            $row = $stmt->fetch();

            $this->view('dbtest/index', [
                'title' => 'Kiểm tra Database',
                'ok' => $row['ok'] ?? null,
                'db_name' => $row['db_name'] ?? DB_NAME,
            ], 'layoutmaster');
        } catch (Throwable $e) {
            $this->view('dbtest/index', [
                'title' => 'Kiểm tra Database',
                'error' => $e->getMessage(),
            ], 'layoutmaster');
        }
    }

    /** Tạo database + bảng users + tài khoản admin/123456 (chạy một lần). */
    public function install()
    {
        try {
            $pdo = Database::getServerConnection();
            $dbName = DB_NAME;

            $pdo->exec(
                "CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
            );
            $pdo->exec("USE `{$dbName}`");
            $pdo->exec(
                'CREATE TABLE IF NOT EXISTS users (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
            );

            $stmt = $pdo->prepare('SELECT id FROM users WHERE username = :username LIMIT 1');
            $stmt->execute(['username' => 'admin']);
            if (!$stmt->fetch()) {
                $hash = password_hash('123456', PASSWORD_DEFAULT);
                $insert = $pdo->prepare(
                    'INSERT INTO users (username, password) VALUES (:username, :password)'
                );
                $insert->execute(['username' => 'admin', 'password' => $hash]);
            }

            $pdo->exec(
                'CREATE TABLE IF NOT EXISTS students (
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    ma_sv VARCHAR(20) NOT NULL UNIQUE,
                    ho_ten VARCHAR(100) NOT NULL,
                    email VARCHAR(100) DEFAULT NULL,
                    lop VARCHAR(50) DEFAULT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4'
            );

            $sampleStudents = [
                ['ma_sv' => 'SV001', 'ho_ten' => 'Nguyễn Văn An', 'email' => 'an.nguyen@example.com', 'lop' => '68PM4'],
                ['ma_sv' => 'SV002', 'ho_ten' => 'Trần Thị Bình', 'email' => 'binh.tran@example.com', 'lop' => '68PM4'],
                ['ma_sv' => 'SV003', 'ho_ten' => 'Lê Quang Anh', 'email' => 'anh.le@example.com', 'lop' => '68PM4'],
            ];
            $checkSv = $pdo->prepare('SELECT id FROM students WHERE ma_sv = :ma_sv LIMIT 1');
            $insertSv = $pdo->prepare(
                'INSERT INTO students (ma_sv, ho_ten, email, lop) VALUES (:ma_sv, :ho_ten, :email, :lop)'
            );
            foreach ($sampleStudents as $sv) {
                $checkSv->execute(['ma_sv' => $sv['ma_sv']]);
                if (!$checkSv->fetch()) {
                    $insertSv->execute($sv);
                }
            }

            $this->view('dbtest/install', [
                'title' => 'Cài đặt Database',
                'success' => true,
                'db_name' => $dbName,
            ], 'layoutmaster');
        } catch (Throwable $e) {
            $this->view('dbtest/install', [
                'title' => 'Cài đặt Database',
                'success' => false,
                'error' => $e->getMessage(),
            ], 'layoutmaster');
        }
    }
}
