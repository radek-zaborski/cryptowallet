<?php
include_once('./config/api.php');
include_once('./config/apiFunctions.php');
include_once('./src/class/cryptoWalletClass.php');

if (isset($_SESSION['username']) and isset($_SESSION['password'])) {
  $funcDisp = new cryptoWallet();
  $funcDisp->hiddenLogOutMenu();
}
?>

<section class="mainPage__container__allCrypto">

  <?php
  foreach ($firstTenCoinInArray as $coinData) {
    $coin = findSingleCoin($coinData->id);

    $crypto = new cryptoWallet();

    $crypto->generateTop10($coin);
  } ?>
</section>