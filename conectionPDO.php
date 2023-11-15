<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $db = 'pruebas';

  $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

  $link = new PDO($dsn, $user, $password);