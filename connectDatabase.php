<?php

include_once('./config/config.php');
$servername = $configuration['host'];
$username = $configuration['user'];
$password = $configuration['password'];
$dbname = $configuration['database'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  dump('lipa');
};