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

    ?>


    <nav>
      <ul>
        <li><a href='/'>Strona główna</a></li>
        <li><a href='/?action=myWallet'>Mój portfel</a></li>
        <li><a href='/?action=market'>Giełda</a></li>
      </ul>
    </nav>

  </header>


  <?php

  include_once("./templates/pages/$page.php");
  ?>

  <footer>stopka</footer>

</body>

</html>