<?php
final class DB {
  private PDO $pdo;
  private array $whitelist;

  public function __construct(array $cfg) {
    $db  = $cfg['db'];
    $dsn = "mysql:host={$db['host']};dbname={$db['name']};charset={$db['charset']}";
    $this->pdo = new PDO($dsn, $db['user'], $db['pass'], [
      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES=>false,
    ]);
    $this->whitelist = $cfg['whitelist'];
  }

  private function ensureTable(string $t): void {
    if (!isset($this->whitelist[$t])) throw new InvalidArgumentException('table_not_allowed');
  }
  private function allow(string $t, array $data): array {
    $allowed = $this->whitelist[$t] ?? [];
    return array_intersect_key($data, array_flip($allowed));
  }

  public function list(string $t, array $opts=[], array $cols=[]){
    $this->ensureTable($t);
    $allowed = $this->whitelist[$t];
    $cols = $cols ? array_values(array_intersect($cols, $allowed)) : $allowed;
    $colSql = $cols ? '`'.implode('`,`',$cols).'`' : '*';

    $where = $this->allow($t, $opts['where'] ?? []);
    $wsql=''; $vals=[];
    if ($where) {
      $pairs=[]; foreach($where as $c=>$v){ $pairs[]="`$c`=?"; $vals[]=$v; }
      $wsql=' WHERE '.implode(' AND ',$pairs);
    }

    $order = $opts['order'] ?? null; $osql='';
    if (is_array($order)){
      $parts=[];
      foreach ($order as $c=>$dir) if (in_array($c,$allowed,true)) $parts[]="`$c` ".(strtoupper($dir)==='DESC'?'DESC':'ASC');
      if ($parts) $osql=' ORDER BY '.implode(',',$parts);
    }
    $limit  = isset($opts['limit'])  ? max(1,(int)$opts['limit'])  : null;
    $offset = isset($opts['offset']) ? max(0,(int)$opts['offset']) : null;
    $lsql = $limit  ? " LIMIT $limit"  : '';
    $osf  = $offset !== null ? " OFFSET $offset" : '';

    $sql="SELECT $colSql FROM `$t`$wsql$osql$lsql$osf";
    $st=$this->pdo->prepare($sql); $st->execute($vals);
    return (object)['success'=>true,'rows'=>$st->fetchAll()];
  }

  public function add(string $t, array $data){
    $this->ensureTable($t);
    $data = $this->allow($t, $data);
    if (!$data) throw new InvalidArgumentException('no_data');
    $cols=array_keys($data); $marks=rtrim(str_repeat('?,',count($cols)),',');
    $sql="INSERT INTO `$t` (`".implode('`,`',$cols)."`) VALUES ($marks)";
    $st=$this->pdo->prepare($sql); $st->execute(array_values($data));
    return (object)['success'=>true,'id'=>(int)$this->pdo->lastInsertId(),'message'=>'inserted'];
  }

  public function update(string $t, int $id, array $data){
    if ($id<=0) throw new InvalidArgumentException('bad_id');
    $this->ensureTable($t);
    $data = $this->allow($t, $data);
    if (!$data) throw new InvalidArgumentException('no_data');
    $set = implode(',', array_map(fn($c)=>"`$c`=?",array_keys($data)));
    $sql="UPDATE `$t` SET $set WHERE `id`=?"; $st=$this->pdo->prepare($sql);
    $st->execute([...array_values($data),$id]);
    return (object)['success'=>true,'updated'=>$st->rowCount(),'message'=>'updated'];
  }

  public function delete(string $t, int $id){
    if ($id<=0) throw new InvalidArgumentException('bad_id');
    $this->ensureTable($t);
    $st=$this->pdo->prepare("DELETE FROM `$t` WHERE `id`=?"); $st->execute([$id]);
    return (object)['success'=>true,'deleted'=>$st->rowCount(),'message'=>'deleted'];
  }
}
