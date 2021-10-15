<?php
header('Refresh: 2; /');
session_destroy();

echo ('<h2 class="logout-info"> Pomyślnie wylogowano :) </h2>');