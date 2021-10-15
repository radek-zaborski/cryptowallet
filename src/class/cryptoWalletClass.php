<?php

class cryptoWallet
{

  /*HIDDEN OBJECT*/

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


  /*RENDER MY WALLET*/

  public function generateMyWallet($data)

  {
 
    if ($data['namecrypto'] == NULL) {
      return null;
    } else {
      include_once('./config/connectDatabase.php');
      include_once('./config/dbFunc.php');
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
  <div class="wallet__container-button">

    <form method="post">
      <input type="submit" name=<?php echo ('delete' . $data['id']); ?> value=<?php echo "usuń"; ?> />
    </form>

    <!-- <button onclick="" name=" delete" class="wallet__button--delete">Usuń krypto</button>

        <button name='edit' class="wallet__button--edit">Edytuj krypto</button> -->
  </div>
</article>
<?php

      if (isset($_POST['delete' . $data['id']])) {

        $deleteCrypto = deleteCrypto($data['id']);
        $conn = $_SESSION['connectDb'];
        $conn->query($deleteCrypto);
        header('Refresh: 0; /?action=MyWallet');
      }
    }
  }

  /*RENDER TOP10*/

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