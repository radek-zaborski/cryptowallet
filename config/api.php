<?php
stream_context_set_default([
  'ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
  ]
]);

$json = file_get_contents('https://api.coinpaprika.com/v1/coins');
$dataCoins = json_decode($json);
$arrayCoinsApi = (array)$dataCoins;
$objectCoinsApi = (object)$dataCoins;
$firstTenCoinInArray = (array_slice($arrayCoinsApi, 0, 10));