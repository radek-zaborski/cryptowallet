<?php

function findCrypto($name)
{
  $jsonFindCrypto = file_get_contents("https://api.coinpaprika.com/v1/coins/$name");
  echo $jsonFindCrypto;
};