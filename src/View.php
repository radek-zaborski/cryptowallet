<?php

declare(strict_types=1);

namespace App;


class View
{

  public function render(string $page, array $configuration): void
  {
    include_once('./connectDatabase.php');
    include_once('./templates/layout.php');

    dump($configuration);
  }
}