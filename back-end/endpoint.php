<?php
require __DIR__ . '/bootstrap.php';
try {
  Auth::enforceReferer($CFG['referer_prefix'] ?? null);
  Auth::rateLimit($CFG['rate_limit'] ?? []);
  Auth::requireLoggedIn();
  $pdo = new PDO(
    "mysql:host={$CFG['db']['host']};dbname={$CFG['db']['name']};charset={$CFG['db']['charset']}",
    $CFG['db']['user'],
    $CFG['db']['pass'],
    [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
    ]
  );
  Auth::verifyUserInDatabase($pdo);
  
  $raw = file_get_contents('php://input');
  $in  = json_decode($raw, true);
  if (!is_array($in)) $in = $_POST;

  // handshake to get a server token
  if (($in['op'] ?? '') === 'handshake') {
    $issued = Auth::issueToken((int)$CFG['csrf_ttl']);
    echo json_encode(['success'=>true]+$issued); exit;
  }

  // security triplet
  Auth::verifyToken($in['token'] ?? null);
  Auth::verifyNonce((int)($in['ts'] ?? 0), (string)($in['nonce'] ?? ''), (int)$CFG['nonce_window']);

  // map op → server-only handler
  $OPS = require __DIR__ . '/ops.php';
  $op  = $in['op'] ?? '';
  if (!$op || !isset($OPS[$op])) {
    http_response_code(400);
    echo json_encode(['success'=>false,'error'=>'unknown_op']); exit;
  }

  // invoke op handler to build a DB call
  $plan = $OPS[$op]((array)($in['data'] ?? []));
  $db   = new DB($CFG);

  switch ($plan['method'] ?? '') {
    case 'list':
      $res = $db->list($plan['table'], $plan['opts'] ?? [], $plan['cols'] ?? []);
      break;
    case 'add':
      $res = $db->add($plan['table'], $plan['data'] ?? []);
      break;
    case 'update':
      $res = $db->update($plan['table'], (int)($plan['id'] ?? 0), $plan['data'] ?? []);
      break;
    case 'delete':
      $res = $db->delete($plan['table'], (int)($plan['id'] ?? 0));
      break;
    default:
      throw new InvalidArgumentException('bad_plan');
  }

  echo json_encode($res, JSON_UNESCAPED_UNICODE);
} catch (Throwable $e) {
  http_response_code(400);
  echo json_encode(['success'=>false,'error'=>$e->getMessage()]);
}
