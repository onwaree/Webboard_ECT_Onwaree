<?php
$rate = 0.24;

$y = $_POST['yen'];

$baht = $y * $rate;

echo "$y Yen = $baht Baht";
?>