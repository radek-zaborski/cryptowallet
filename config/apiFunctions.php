<?php

function findSingleCoin($nameCrypto)
{
  $detailCoinApi = file_get_contents("https://api.coinpaprika.com/v1/tickers/$nameCrypto");
  return (array)json_decode($detailCoinApi);
}