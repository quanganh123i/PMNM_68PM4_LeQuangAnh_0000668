<?php
session_start();

require_once dirname(__DIR__) . '/app/core/App.php';
require_once dirname(__DIR__) . '/app/core/Controller.php';
require_once dirname(__DIR__) . '/app/core/Middleware.php';

// Kiểm tra middleware trước khi chạy app
$middleware = new Middleware();
$middleware->checkLogin();

$app = new App();
