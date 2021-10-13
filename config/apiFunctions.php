<?php

function findSingleCoin($nameCrypto)
{
  $detailCoinApi = file_get_contents("https://api.coinpaprika.com/v1/tickers/$nameCrypto");
  return (array)json_decode($detailCoinApi);
}

function findCrypto($array, $find)
{
  $someNameForArray = [];

  foreach ($array as $single) {
    $name = $single->name;
    $nameDownLetter = strtolower($name);
    array_push($someNameForArray, $nameDownLetter);
  }

  $findIdCrypto = $array[array_search($find, $someNameForArray)]->id;

  return (findSingleCoin($findIdCrypto));
};