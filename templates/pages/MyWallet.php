<form method="POST">

  <input type="submit" name="submit" />
</form>

<?php

include_once('./config/connectDatabase.php');




if (isset($_POST['submit'])) {
  $sql = "INSERT INTO crypto (id, user, crypto, value_coin) VALUES ('','asaa','asas','asas')";
  mysqli_query($conn, $sql);
}
if (isset($_POST['submit'])) {
  dump('wyslano odpowiedz');
}