<?php

$json = file_get_contents('https://api.coinpaprika.com/v1/coins/');
$dataCoins = json_decode($json);
$arrayCoinsApi = (array)$dataCoins;
$objectCoinsApi = (object)$dataCoins;
$firstTenCoinInArray = (array_slice($arrayCoinsApi, 0, 10));