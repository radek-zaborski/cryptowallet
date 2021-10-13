<?php


class cryptoWallet
{

  public function hiddenLoginArea()
  {
?>
<script language="javascript">
let loginMenu = document.querySelector('.wallet_login-form');
loginMenu.classList.add('hidden');
</script>
<?php
  }


  public function generateCrypto($data)
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

  public function logout()
  {
    session_destroy();
  }
}