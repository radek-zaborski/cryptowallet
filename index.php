<?php

declare(strict_types=1);

require_once('./src/utils/debug.php');

$action = $_GET['action'] ?? null;

if ($action == '') {
  include_once('./templates/pages/MainPage.php');
} elseif ($action == 'myWallet') {
  include_once('./templates/pages/Mywallet.php');
} elseif ($action == 'market') {
  include_once('./templates/pages/Market.php');
}