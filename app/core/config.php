<?php

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
// index.php nằm trong public/ → bỏ /public để link đúng khi dùng .htaccess ở thư mục gốc
$baseUrl = preg_replace('#/public$#', '', rtrim($scriptDir, '/'));
define('BASE_URL', $baseUrl === '' ? '' : $baseUrl);

// MySQL (XAMPP) — chỉnh tên DB nếu cần
define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'pmnm_db');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');

// Debug: In ra DB_NAME để kiểm tra
// echo "DB_NAME: " . DB_NAME; exit;
