-- Import file này trong phpMyAdmin (XAMPP) hoặc mở /dbtest/install một lần
CREATE DATABASE IF NOT EXISTS pmnm_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE pmnm_db;

CREATE TABLE IF NOT EXISTS users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS students (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  ma_sv VARCHAR(20) NOT NULL UNIQUE,
  ho_ten VARCHAR(100) NOT NULL,
  email VARCHAR(100) DEFAULT NULL,
  lop VARCHAR(50) DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS lophoc (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  ma_lop VARCHAR(20) NOT NULL UNIQUE,
  ten_lop VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tài khoản: admin / 123456 (mật khẩu được hash bằng PHP password_hash)
-- Nếu import tay, chạy /dbtest/install để tạo user admin và dữ liệu mẫu sinh viên.
