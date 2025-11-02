<?php
require __DIR__ . '/bootstrap.php';

try {
    // Already logged in?
    if (!empty($_SESSION['user_id'])) {
        echo json_encode(['success'=>true]);
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$username || !$password) {
        throw new Exception('الرجاء ملء جميع الحقول');
    }

    // DB connect (same config as elsewhere)
    $db = $CFG['db'];
    $pdo = new PDO(
        "mysql:host={$db['host']};dbname={$db['name']};charset={$db['charset']}",
        $db['user'],
        $db['pass'],
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]
    );

    $stmt = $pdo->prepare("SELECT user_id, password FROM users WHERE username = ? LIMIT 1");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if (!$user) {
        throw new Exception('Invalid login');
    }

    // Validate password
    if (!password_verify($password, $user['password'])) {
        throw new Exception('Invalid login');
    }

    $_SESSION['user_id'] = $user['id'];

    echo json_encode(['success'=>true]);
} catch (Throwable $e) {
    echo json_encode(['success'=>false, 'error'=>$e->getMessage()]);
}
