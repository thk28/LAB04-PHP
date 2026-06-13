<?php
namespace App\Controllers;

class DashboardController {
    public function index(): void {
        require_login();
        view('dashboard', ['view' => 'dashboard']);
    }

    public function sessionDebug(): void {
        require_login();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'session_id' => session_id(),
            'session_name' => session_name(),
            'user_data' => [
                'id' => $_SESSION['user_id'] ?? null,
                'name' => $_SESSION['user_name'] ?? null,
                'role' => $_SESSION['role'] ?? null,
            ],
            'meta' => [
                'login_time' => date('Y-m-d H:i:s', $_SESSION['login_at'] ?? time()),
                'last_activity' => date('Y-m-d H:i:s', $_SESSION['last_activity_at'] ?? time()),
                'user_agent' => $_SESSION['user_agent'] ?? '',
            ]
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}