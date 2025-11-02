<?php
final class Auth {
    
  public static function requireLoggedIn(): void {
    if (empty($_SESSION['user_id'])) {
      http_response_code(401);
      echo json_encode(['success'=>false,'error'=>'not_logged_in']); exit;
    }
  }

 public static function verifyUserInDatabase(PDO $pdo): void {
    if (empty($_SESSION['user_id'])) {
        self::deny('not_logged_in');
    }

    $stmt = $pdo->prepare("SELECT user_id FROM users WHERE user_id = ? LIMIT 1");
    $stmt->execute([$_SESSION['user_id']]);
    $row = $stmt->fetch();

    if (!$row) {
        self::deny('user_not_found');
    }
}



  public static function issueToken(int $ttl): array {
    $t = bin2hex(random_bytes(24));
    $_SESSION['api_token'] = $t;
    $_SESSION['api_token_exp'] = time() + $ttl;
    $_SESSION['api_nonces'] = [];
    return ['token'=>$t,'exp'=>$_SESSION['api_token_exp']];
  }

  public static function verifyToken(?string $t): void {
    if (!$t || empty($_SESSION['api_token']) || empty($_SESSION['api_token_exp'])) self::deny('no_token');
    if (!hash_equals($_SESSION['api_token'], $t)) self::deny('bad_token');
    if (time() > $_SESSION['api_token_exp']) self::deny('expired_token');
  }

  public static function verifyNonce(int $ts, string $nonce, int $window): void {
    if (!$ts || !$nonce || abs(time()-$ts) > $window) self::deny('stale_timestamp');
    $k = $ts.':'.$nonce;
    $_SESSION['api_nonces'] = $_SESSION['api_nonces'] ?? [];
    if (isset($_SESSION['api_nonces'][$k])) self::deny('replay');
    $_SESSION['api_nonces'][$k] = 1;
    if (count($_SESSION['api_nonces']) > 500) array_shift($_SESSION['api_nonces']);
  }

  public static function enforceReferer(?string $prefix): void {
    if (!$prefix) return;
    $r = $_SERVER['HTTP_REFERER'] ?? '';
    if (stripos($r, $prefix) !== 0) self::deny('bad_referer');
  }

  public static function rateLimit(array $cfg): void {
    if (empty($cfg['enabled'])) return;
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $k  = 'rl:'.$ip;
    $_SESSION[$k] = $_SESSION[$k] ?? ['win'=>time(),'n'=>0];
    if (time() - $_SESSION[$k]['win'] > 60) $_SESSION[$k] = ['win'=>time(),'n'=>0];
    $_SESSION[$k]['n']++;
    if ($_SESSION[$k]['n'] > ($cfg['per_minute'] ?? 90)) self::deny('rate_limit');
  }

  private static function deny(string $reason): void {
    http_response_code(403);
    echo json_encode(['success'=>false,'error'=>$reason]); exit;
  }
}
