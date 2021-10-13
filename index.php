<?php

declare(strict_types=1);

namespace App;

require_once('./src/utils/debug.php');
require_once('./src/View.php');

$configuration = require_once('./config/config.php');

const DEFAULT_ACTION = 'MainPage';

$action = $_GET['action'] ?? DEFAULT_ACTION;

$view = new View();
session_start();
$view->render($action, $configuration);