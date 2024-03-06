<?php

$host = 'pg';
$db = 'studs';
$user = 's336533';
$password = 'fWty2E3yNk56wvM6';

$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$postEmail = $_POST['email'];

$query = $pdo->query('SELECT * FROM gameUsers WHERE email = xxxr771@gmail.com;');

if($query->rowCount() > 0)
{
  $resultset = $query->fetchAll(\PDO::FETCH_ASSOC);
  echo 'Привет, ты уже зарегистрирован!';
}
else
{
  echo ' Привет, новенький!';
}