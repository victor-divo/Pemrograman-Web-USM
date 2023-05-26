<?php
$kata = $_POST['kata'];
$jumlah = $_POST['jml'];
$i = 1;
do {
    echo "$i. $kata";
    echo "<br>";
    $i++;
} while ($i <= $jumlah);
