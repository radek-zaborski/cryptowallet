<?php
header('Refresh: 5; /');
session_destroy();

echo ('<h2 class="logout-info"> Pomyślnie wylogowano :) </h2>');