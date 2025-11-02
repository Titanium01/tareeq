<?php
return [
  'db' => [
    'host' => 'localhost',
    'name' => 'tareeq',
    'user' => 'root',
    'pass' => '',
    'charset' => 'utf8mb4',
  ],
  // per-table column whitelists (server-only)
  'whitelist' => [
    'articles' => ['id','title','date','description','picture','created_at','updated_at'],
    // add other tables here
  ],
  'csrf_ttl'       => 1800,   // server token lifetime (seconds)
  'nonce_window'   => 300,    // replay window (seconds)
  'rate_limit'     => [ 'enabled' => true, 'per_minute' => 90 ],
  'referer_prefix' => null,   // e.g. 'https://tareeq-alrahma.org' or null to disable
];
