<!DOCTYPE html>
<html lang="pl-PL">
<html>

<head>
  <meta charset="utf-8">
  <link href="./styles.css" rel="stylesheet">
  <title>Page Title</title>
</head>

<body>
  <header>

    <?php

    include_once('header.php');
    $pg = $_GET['action'] ?? '';
    ?>


    <nav>
      <ul>
        <li class="<?php if ($pg == '') {
                      echo 'activeLink';
                    } ?> "><a href='/'>Strona główna</a></li>
        <li class="<?php if ($pg == 'MyWallet') {
                      echo 'activeLink';
                    } ?> "><a href='/?action=MyWallet'>Mój portfel</a></li>
        <li class="<?php if ($pg == 'Market') {
                      echo 'activeLink';
                    } ?> "><a href='/?action=Market'>Giełda</a></li>
        <li><a href='/?action=logout'>Wyloguj</a></li>
      </ul>
    </nav>

  </header>


  <?php

  include_once("./templates/pages/$page.php");
  ?>

  <footer></footer>

</body>

</html>