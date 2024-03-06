<?php

$host = 'pg';
$db = 'studs';
$user = 's336533';
$password = 'fWty2E3yNk56wvM6';

$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

$pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$query = $pdo->query('SELECT * FROM gameUsers');
$resultset = $query->fetchAll(\PDO::FETCH_ASSOC);

echo '<ol>';
foreach($resultset as $stud)
{
  echo '<li>' . $stud['id'] . '. ' .  $stud['name'] . ' ' . $stud['email'] . $stud['email'] .'</li>';
}
echo '</ol>';