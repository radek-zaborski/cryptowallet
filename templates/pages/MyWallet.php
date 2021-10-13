<?php

include_once('./config/connectDatabase.php');
include_once('./src/class/cryptoWalletClass.php');

if (isset($_POST['username']) and isset($_POST['password'])) {
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['password'] = $_POST['password'];
}
?>
<form class="wallet__login-form" method="POST">
  <label for="username">nazwa użytkownika: </label>
  <input type="text" name="username" />
  <label>hasło: </label>
  <input type="password" name="password" />
  <input type="submit" name="submit" />
</form>

<article class="wallet">
  <?php

  $username = '';
  $password = '';
  $test = ['1'];

  if (isset($_SESSION['username'])) {
    $username = htmlentities($_SESSION['username']);
  };
  if (isset($_SESSION['password'])) {
    $password = htmlentities($_SESSION['password']);
  };

  $query = "SELECT * FROM cryptousers WHERE (username = '$username' AND password = '$password' )";
  $queryPass = "SELECT * FROM cryptousers WHERE (password = '$password')";
  $queryLogin = "SELECT * FROM cryptousers WHERE (username = '$username')";
  $result = ($conn->query($query));

  $arrayWithResponse = [];

  if (isset($_SESSION['username'])) {

    foreach ($result as $singleResultResponse) {

      array_push($arrayWithResponse, $singleResultResponse);
    };

    if (isset($arrayWithResponse)) {

      foreach ($arrayWithResponse as $data) {

        $renderCrypto = new cryptoWallet();
        $renderCrypto->hiddenLoginArea();
        $renderCrypto->generateCrypto($data);
      }
    } else {

      if ($conn->query($queryLogin)->num_rows > 0 or $conn->query($queryPass)->num_rows > 0) {

  ?><h3>błędny login lub hasło</h3>

  <?php
      } else {

      ?> <h3>Zaloguj się</h3>
  <?php

      }
    }
  }

  ?>
</article>