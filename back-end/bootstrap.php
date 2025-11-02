<?php
session_start();
$CFG = require __DIR__ . '/config.php';

spl_autoload_register(function($cls){
  $root = dirname(__DIR__);
  $map  = [
    'Auth' => $root . '/classes/Auth.php',
    'DB'   => $root . '/classes/DB.php',
  ];
  if (isset($map[$cls])) require $map[$cls];
});

header('Content-Type: application/json; charset=utf-8');
