<?php
// api/ops.php
return [
  // Articles
  'article.create' => function(array $in){
    // sanitize/shape input
    $data = [
      'title'       => trim((string)($in['title'] ?? '')),
      'date'        => $in['date'] ?? null,
      'description' => trim((string)($in['description'] ?? '')),
      'picture'     => $in['picture'] ?? null,
      'created_at'  => date('Y-m-d H:i:s'),
    ];
    return ['method'=>'add', 'table'=>'articles', 'data'=>$data];
  },

  'article.update' => function(array $in){
    $id = (int)($in['id'] ?? 0);
    $patch = [];
    foreach (['title','date','description','picture'] as $c) {
      if (array_key_exists($c, $in)) $patch[$c] = is_string($in[$c]) ? trim($in[$c]) : $in[$c];
    }
    $patch['updated_at'] = date('Y-m-d H:i:s');
    return ['method'=>'update', 'table'=>'articles', 'id'=>$id, 'data'=>$patch];
  },

  'article.delete' => function(array $in){
    return ['method'=>'delete', 'table'=>'articles', 'id'=>(int)($in['id'] ?? 0)];
  },

  'article.list' => function(array $in){
    return ['method'=>'list', 'table'=>'articles', 'opts'=>[
      'where'  => [],                 // server decides
      'order'  => ['created_at'=>'DESC'],
      'limit'  => 50,
      'offset' => 0
    ]];
  },
];
