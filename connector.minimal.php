<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

define('LIBRARIES', dirname(__DIR__, 3) . '/libraries/');
require_once LIBRARIES . 'config.php';
if (
    empty($loginAdmin) ||
    empty($_SESSION[$loginAdmin]['active']) ||
    $_SESSION[$loginAdmin]['active'] !== true
) {
    http_response_code(403);
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

    echo json_encode(
        array(
            'error' => array(
                'errAccess',
                'Bạn cần đăng nhập quản trị.'
            )
        ),
        JSON_UNESCAPED_UNICODE
    );

    exit;
}

// Phần code elFinder hiện có tiếp tục ở bên dưới...
error_reporting(0); // Set E_ALL for debuging ...
