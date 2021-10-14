<?php

declare(strict_types=1);

namespace App;

class View
{

  public function render(string $page, array $configuration)
  {
    include('./config/api.php');
    include_once('./templates/layout.php');
  }
}