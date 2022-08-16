<?php

$hari = ["Senin", "Selasa", "Rabu"];
$bulan = ["Januari", "Februari", "Maret"];
$arr1 = [123, "tulisan", false];

var_dump($hari);
echo "<br>";
print_r($bulan);

echo "<br>";
echo $arr1[0];

echo "<br>";
echo $bulan[2];

echo "<br>";
var_dump($hari);
echo "<br>";
$hari[] = "Kamis";
var_dump($hari);
