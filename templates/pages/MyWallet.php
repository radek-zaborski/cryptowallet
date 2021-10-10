<?php
include_once('./config/connectDatabase.php');
include_once('./src/class/cryptoWalletClass.php');
?>
<form class="wallet_login-form" method="POST">
  nazwa użytkownika<input type="text" name="username" />
  hasło<input type="text" name="password" />
  <input type="submit" name="submit" />
</form>

<article class="wallet">
  <?php
  $username = '';
  $password = '';
  if (isset($_POST['username'])) {
    $username = htmlentities($_POST['username']);
  };
  if (isset($_POST['password'])) {
    $password = htmlentities($_POST['password']);
  };


  $query = "SELECT * FROM cryptousers WHERE (username = '$username' AND password = '$password' )";
  $queryPass = "SELECT * FROM cryptousers WHERE (password = '$password')";
  $queryLogin = "SELECT * FROM cryptousers WHERE (username = '$username')";
  $result = ($conn->query($query));

  $arrayWithResponse = [];

  if (isset($query)) {

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