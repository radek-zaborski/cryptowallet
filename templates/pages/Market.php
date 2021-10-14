<?php
include_once('./config/apiFunctions.php');
include_once('./config/controllerClass.php');
include_once('./src/class/cryptoWalletClass.php');

if (isset($_SESSION['username']) and isset($_SESSION['password'])) {
  $funcDisp = new cryptoWallet();
  $funcDisp->hiddenLogOutMenu();
}
?>

<article class="market__container">

  <form method="post">
    Wyszukaj kryptowaluty po nazwie <input type="text" name="name" />
    <input class='button-send' type="submit" />
    <h5>Dane pochodzą z serwisu Coinpaprika.com</h5>
  </form>

  <?php

  $nameFindCrypto = strtolower($_POST['name'] ?? 'bitcoin');

  $cryptoSearch = findCrypto($arrayCoinsApi, $nameFindCrypto);

  ?>
  <article class="market__findArticle">
    <?php

    if ($nameFindCrypto == '') {
    ?>
    <h1>Wprowadź nazwę do wyszukiwarki</h1>
    <?php
    } elseif ($nameFindCrypto !== null) { ?>

    <h1>Nazwa:
      <?php

      echo $cryptoSearch['name'];
    } ?>
    </h1>

    <p><b>Symbol:
        <?php echo $cryptoSearch['symbol'] ?? '' ?>
      </b></p>
    <p>Ranking:
      <?php echo $cryptoSearch['rank'] ?? '' ?>
    </p>
    <p><b>Cena:
        <?php echo '$' . round($cryptoSearch['quotes']->USD->price ?? 0, 4)  ?>
      </b></p>
    <p>zmiany w ciągu 15 minut:
      <span
        class="<?php echo checkTrend($cryptoSearch['quotes']->USD->percent_change_15m ?? ''); ?>"><?php echo $cryptoSearch['quotes']->USD->percent_change_15m . '%' ?? ''  ?>
      </span>
    </p>
    <p>zmiany w ciągu 30 minut:
      <span
        class="<?php echo checkTrend($cryptoSearch['quotes']->USD->percent_change_30m ?? '') ?? ''; ?>"><?php echo $cryptoSearch['quotes']->USD->percent_change_30m . '%' ?? ''  ?>
      </span>
    </p>
    <p>zmiany w ciągu 1 godziny:
      <span
        class="<?php echo checkTrend($cryptoSearch['quotes']->USD->percent_change_1h ?? '') ?? ''; ?>"><?php echo $cryptoSearch['quotes']->USD->percent_change_1h . '%' ?? ''  ?>
      </span>
    </p>
    <p>zmiany w ciągu 6 godzin:
      <span
        class="<?php echo checkTrend($cryptoSearch['quotes']->USD->percent_change_6h ?? '') ?? ''; ?>"><?php echo $cryptoSearch['quotes']->USD->percent_change_6h . '%' ?? ''  ?>
      </span>
    </p>
    <p>zmiany w ciągu 12 godzin:
      <span
        class="<?php echo checkTrend($cryptoSearch['quotes']->USD->percent_change_12h ?? '') ?? ''; ?>"><?php echo $cryptoSearch['quotes']->USD->percent_change_12h . '%' ?? ''  ?>
      </span>
    </p>
    <p>zmiany w ciągu 24h:
      <span
        class="<?php echo checkTrend($cryptoSearch['quotes']->USD->percent_change_24h ?? '') ?? ''; ?>"><?php echo $cryptoSearch['quotes']->USD->percent_change_24h . '%' ?? ''  ?>
      </span>
    </p>
    <p>zmiany w ciągu 7 dni:
      <span
        class="<?php echo checkTrend($cryptoSearch['quotes']->USD->percent_change_7d ?? '') ?? ''; ?>"><?php echo $cryptoSearch['quotes']->USD->percent_change_7d . '%' ?? ''  ?>
      </span>
    </p>
    <p>zmiany w ciągu 30 dni:
      <span
        class="<?php echo checkTrend($cryptoSearch['quotes']->USD->percent_change_30d ?? '') ?? ''; ?>"><?php echo $cryptoSearch['quotes']->USD->percent_change_30d . '%' ?? ''  ?>
      </span>
    </p>
  </article>
</article>