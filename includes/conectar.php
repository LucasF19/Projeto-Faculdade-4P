<?php

$username = 'root';
$password = '';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
  header("Location: error.php");
  die("Falha na conexão: " . $mysqli->connect_error);
}
