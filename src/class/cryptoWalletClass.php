<?php

class cryptoWallet


/*HIDDEN OBJECT*/
{
  public function hiddenLoginArea()
  {
?>
<script language="javascript">
const loginMenu = document.querySelector('.wallet__login-form');
loginMenu.classList.add('hidden');
const logOutLink = document.querySelector('.logout-link');
logOutLink.classList.remove('hidden');
</script>
<?php
  }


  public function hiddenLogOutMenu()
  {
  ?>
<script language="javascript">
const logOutLink = document.querySelector('.logout-link');
logOutLink.classList.remove('hidden');
</script>
<?php
  }


  /* RENDER OBJECT */

  public function generateMyWallet($data)
  {
  ?>
<article class="wallet__container-single-crypto">
  <?php echo 'Nazwa Crypto: </br>' ?>
  <h3>
    <?php echo ($data['namecrypto']);
        ?>
  </h3>
  <?php echo "Cena zakupu: " ?>
  <h3>
    <?php echo $data['pricecrypto'] . " $" ?>
  </h3>
  <?php echo "Ilość: " ?>
  <h3>
    <?php echo $data['valuecrypto'] ?>
  </h3>

</article>
<?php
  }

  public function generateTop10($data)
  {
    $detaildata = (((array)$data['quotes'])['USD']);
  ?>
<div class="mainPage__container-crypto">

  <h2 class="mainPage__title-crypto">
    <?php
        echo $data['name'] . "&nbsp" . " #" .  $data['rank'];
        ?>
  </h2>

  <h3 class="mainPage__price">
    Cena: <?php echo round($detaildata->price, 4) . ' $' ?>
  </h3></br></br>

  <figure class="mainPage__chart-data">
    <h3> 30 min:</h3></br>

    <?php
        if ($detaildata->percent_change_30m > -1 & $detaildata->percent_change_30m < 1) { ?>
    <img src="../../src/image/constans.png" />
    <figcaption>
      <p class="blue"><?php echo $detaildata->percent_change_30m . '%' ?></p>
    </figcaption>
    <?php

        } elseif ($detaildata->percent_change_30m < -1) { ?>
    <img src="../../src/image/down.png" />
    <figcaption>
      <p class="red"><?php echo $detaildata->percent_change_30m . '%' ?></p>
    </figcaption>
    <?php
        } elseif ($detaildata->percent_change_30m > 1) { ?>
    <img src="../../src/image/up.png" />
    <figcaption>
      <p class="green"><?php echo $detaildata->percent_change_30m . '%' ?></p>
    </figcaption>
    <?php
        }
        ?>
  </figure>
  <figure class="mainPage__chart-data">
    <h3> 60 min:</h3></br>
    <?php
        if ($detaildata->percent_change_1h > -1 & $detaildata->percent_change_1h < 1) { ?>
    <img src="../../src/image/constans.png" />
    <figcaption>
      <p class="blue"><?php echo $detaildata->percent_change_1h . '%' ?></p>
    </figcaption>
    <?php
        } elseif ($detaildata->percent_change_1h < -1) { ?>
    <img src="../../src/image/down.png" />
    <figcaption>
      <p class="red"><?php echo $detaildata->percent_change_1h . '%' ?></p>
    </figcaption>
    <?php
        } elseif ($detaildata->percent_change_1h > 1) { ?>
    <img src="../../src/image/up.png" />

    <p class="green"><?php echo $detaildata->percent_change_1h . '%' ?></p>

    <?php
        }
        ?>
  </figure>


  <figure class="mainPage__chart-data">
    <h3> 1 dzień:</h3></br>
    <?php
        if ($detaildata->percent_change_24h > -1 & $detaildata->percent_change_24h < 1) { ?>
    <img src="../../src/image/constans.png" />
    <figcaption>
      <p class="blue"><?php echo $detaildata->percent_change_24h . '%' ?></p>
    </figcaption>
    <?php
        } elseif ($detaildata->percent_change_24h < -1) { ?>
    <img src="../../src/image/down.png" />
    <figcaption>
      <p class="red"><?php echo $detaildata->percent_change_24h . '%' ?></p>
    </figcaption>
    <?php
        } elseif ($detaildata->percent_change_24h > 1) { ?>
    <img src="../../src/image/up.png" />

    <p class="green"><?php echo $detaildata->percent_change_24h . '%' ?></p>

    <?php
        }
        ?>
  </figure>

</div>
<?php
  }
  public function logout()
  {
    session_destroy();
  }
}