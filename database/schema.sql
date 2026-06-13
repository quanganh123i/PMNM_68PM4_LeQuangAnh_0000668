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

CREATE TABLE IF NOT EXISTS lophoc (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  ma_lop VARCHAR(20) NOT NULL UNIQUE,
  ten_lop VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS students (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  ma_sv VARCHAR(20) NOT NULL UNIQUE,
  ho_ten VARCHAR(100) NOT NULL,
  email VARCHAR(100) DEFAULT NULL,
  lop_id INT UNSIGNED DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (lop_id) REFERENCES lophoc(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dữ liệu mẫu
INSERT IGNORE INTO lophoc (ma_lop, ten_lop) VALUES 
('CNTT1', 'Công nghệ thông tin 1'),
('CNTT2', 'Công nghệ thông tin 2');

INSERT IGNORE INTO students (ma_sv, ho_ten, lop_id) VALUES 
('SV001', 'Nguyễn Văn A', 1),
('SV002', 'Trần Thị B', 2),
('SV003', 'Nguyễn Văn C', 1),
('SV004', 'Trần Thị D', 2),
('SV005', 'Lê Văn E', 1),
('SV006', 'Phạm Thị F', 2),
('SV007', 'Hoàng Văn G', 1),
('SV008', 'Đặng Thị H', 2),
('SV009', 'Vũ Văn I', 1),
('SV010', 'Bùi Thị K', 2),
('SV011', 'Đỗ Văn L', 1),
('SV012', 'Ngô Thị M', 2),
('SV013', 'Dương Văn N', 1),
('SV014', 'Lý Thị O', 2),
('SV015', 'Phan Văn P', 1),
('SV016', 'Trịnh Thị Q', 2),
('SV017', 'Đinh Văn R', 1),
('SV018', 'Lâm Thị S', 2),
('SV019', 'Mai Văn T', 1),
('SV020', 'Nguyễn Thị U', 2);

-- Tài khoản: admin / 123456 
