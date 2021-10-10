<?php

function checkTrend($data)
{
  if ($data < 0) {
    return 'red';
  } elseif ($data > -1 & $data < 1) {
    return 'blue';
  } elseif ($data > 1) {
    return 'green';
  }
}