spoko tutaj jest zawartość strony głównej

<?php
$findCoinData = in_array('BTC', array_column($dataCoins, 'symbol'));
$findcoin = $dataCoins[$findCoinData];
dump($findCoinData);
dump($findCrypto);