<?php

$headerTitle = $_GET['action'] ?? null;

if ($headerTitle == '') { ?>
<h1 class='header__title'>
  <?php

    echo 'STRONA GŁÓWNA';

    ?>
</h1>
<?php
} elseif ($headerTitle === 'MyWallet') { ?>
<h1 class='header__title'>
  <?php
    echo 'MÓJ PORTFEL';
    ?>
</h1>
<?php
} elseif ($headerTitle === 'Market') { ?>
<h1 class='header__title'>
  <?php
    echo 'GIEŁDA';
    ?>
</h1>
<?php };