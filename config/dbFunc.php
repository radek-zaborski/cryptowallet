<?php

function dbQuery($username, $password)
{
  $query = "SELECT * FROM cryptousers WHERE (username = '$username' AND password = '$password' )";

  return $query;
}

function deleteCrypto($cryptoId)
{
  $delete = "DELETE FROM cryptousers WHERE id = $cryptoId";

  return $delete;
}