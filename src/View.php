<?php

declare(strict_types=1);

namespace App;


class View
{

  public function render(string $page, array $configuration): void
  {
    include_once('./config/api.php');
    include_once('./config/connectDatabase.php');
    include_once('./templates/layout.php');
    include_once('./config/apiFunctions.php');
  }
}