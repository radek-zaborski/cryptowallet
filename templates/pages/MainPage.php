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
    $detailCoin = (((array)$coin['quotes'])['USD']);
  ?>

  <div class="mainPage__container-crypto">

    <h2 class="mainPage__title-crypto">
      <?php
        echo $coin['name'] . "&nbsp" . " #" .  $coin['rank'];
        ?>
    </h2>

    <h3 class="mainPage__price">
      Cena: <?php echo round($detailCoin->price, 4) . ' $' ?>
    </h3></br></br>

    <figure class="mainPage__chart-coin">
      <h3> 30 min:</h3></br>

      <?php
        if ($detailCoin->percent_change_30m > -1 & $detailCoin->percent_change_30m < 1) { ?>
      <img src="../../src/image/constans.png" />
      <figcaption>
        <p class="blue"><?php echo $detailCoin->percent_change_30m . '%' ?></p>
      </figcaption>
      <?php

        } elseif ($detailCoin->percent_change_30m < -1) { ?>
      <img src="../../src/image/down.png" />
      <figcaption>
        <p class="red"><?php echo $detailCoin->percent_change_30m . '%' ?></p>
      </figcaption>
      <?php
        } elseif ($detailCoin->percent_change_30m > 1) { ?>
      <img src="../../src/image/up.png" />
      <figcaption>
        <p class="green"><?php echo $detailCoin->percent_change_30m . '%' ?></p>
      </figcaption>
      <?php
        }
        ?>
    </figure>
    <figure class="mainPage__chart-coin">
      <h3> 60 min:</h3></br>
      <?php
        if ($detailCoin->percent_change_1h > -1 & $detailCoin->percent_change_1h < 1) { ?>
      <img src="../../src/image/constans.png" />
      <figcaption>
        <p class="blue"><?php echo $detailCoin->percent_change_1h . '%' ?></p>
      </figcaption>
      <?php
        } elseif ($detailCoin->percent_change_1h < -1) { ?>
      <img src="../../src/image/down.png" />
      <figcaption>
        <p class="red"><?php echo $detailCoin->percent_change_1h . '%' ?></p>
      </figcaption>
      <?php
        } elseif ($detailCoin->percent_change_1h > 1) { ?>
      <img src="../../src/image/up.png" />

      <p class="green"><?php echo $detailCoin->percent_change_1h . '%' ?></p>

      <?php
        }
        ?>
    </figure>


    <figure class="mainPage__chart-coin">
      <h3> 1 dzień:</h3></br>
      <?php
        if ($detailCoin->percent_change_24h > -1 & $detailCoin->percent_change_24h < 1) { ?>
      <img src="../../src/image/constans.png" />
      <figcaption>
        <p class="blue"><?php echo $detailCoin->percent_change_24h . '%' ?></p>
      </figcaption>
      <?php
        } elseif ($detailCoin->percent_change_24h < -1) { ?>
      <img src="../../src/image/down.png" />
      <figcaption>
        <p class="red"><?php echo $detailCoin->percent_change_24h . '%' ?></p>
      </figcaption>
      <?php
        } elseif ($detailCoin->percent_change_24h > 1) { ?>
      <img src="../../src/image/up.png" />

      <p class="green"><?php echo $detailCoin->percent_change_24h . '%' ?></p>

      <?php
        }
        ?>
    </figure>

  </div>
  <?php
  } ?>
</section>