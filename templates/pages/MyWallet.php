<?php

include_once('./config/connectDatabase.php');
include_once('./src/class/cryptoWalletClass.php');
include_once('./config/dbFunc.php');

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
  <input type="submit" name="submit" value="zaloguj" />
</form>

<article class="wallet">
  <?php

  $username = '';
  $password = '';

  if (isset($_SESSION['username'])) {
    $username = htmlentities($_SESSION['username']);
  };
  if (isset($_SESSION['password'])) {
    $password = htmlentities($_SESSION['password']);
  };

  $query = dbQuery($username, $password);


  $result = ($conn->query($query));

  $_SESSION['connectDb'] = $conn;
  $arrayWithResponse = [];


  if (isset($_SESSION['username']) and isset($_SESSION['password'])) {
    if ($result->num_rows == 0) {
      echo "<h3 class='wallet__login-info'>Nie znaleziono użytkownika lub podano błędne dane do logowania</h3>";
    }
    foreach ($result as $singleResultResponse) {

      array_push($arrayWithResponse, $singleResultResponse);
    };

    if (isset($arrayWithResponse)) {

      $checkHaveCrypto = array_search(true, array_column($arrayWithResponse, 'namecrypto'));


      if ($checkHaveCrypto==0 or $checkHaveCrypto==null ) {
        $renderCrypto = new cryptoWallet();
        $renderCrypto->hiddenLoginArea();

        echo "<h3 class='logout-info'>Nie posiadasz żadnej kryptowaluty</h3>";
      } else {

        foreach ($arrayWithResponse as $data) {

          $renderCrypto = new cryptoWallet();
          $renderCrypto->hiddenLoginArea();
          $renderCrypto->generateMyWallet($data);
        }
      }
    }
  } else {
    echo '<h3 class="wallet__login-info"> Wprowadź login oraz hasło</h3>';
  }

  ?>
</article>