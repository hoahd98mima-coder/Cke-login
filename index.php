<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

define('LIBRARIES', dirname(__DIR__, 2) . '/libraries/');
require_once LIBRARIES . 'config.php';
if (
    empty($loginAdmin) ||
    empty($_SESSION[$loginAdmin]['active']) ||
    $_SESSION[$loginAdmin]['active'] !== true
) {
    http_response_code(403);
    header('Content-Type: text/plain; charset=utf-8');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

    echo 'Bạn cần đăng nhập quản trị.';
    exit;
}

?>
// Code index của elfinder  
