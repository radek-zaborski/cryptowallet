<?php

include_once('./config/config.php');
$host = $configuration['host'];
$username = $configuration['user'];
$password = $configuration['password'];
$db = $configuration['database'];

$conn = new mysqli($host, $username, $password, $db);
if ($conn->connect_error) {
  dump('logowanie nie powiodło się');
};