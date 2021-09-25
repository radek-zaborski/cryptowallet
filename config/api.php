<?php

$json = file_get_contents('https://api.coinpaprika.com/v1/coins');
$dataCoins = json_decode($json, true);