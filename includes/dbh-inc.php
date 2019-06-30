<?php
$dbServerName = 'localhost';
$dbUserName = 'root';
$dbPassword = 'root';
$dbName = 'loginsystem';

// utilizando MYSQLI- basta descomentar a linha abaixo
$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

//utilizando PDO
try {
  $pdo = new PDO("mysql:host=$dbServerName;dbname=$dbName", $dbUserName, $dbPassword);
} catch (PDOException $err) {
  echo 'Erro de Conexão. Código : ' . $err->getCode();
}
