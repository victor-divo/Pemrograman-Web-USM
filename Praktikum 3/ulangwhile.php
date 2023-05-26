<?php
$kata = $_POST['kata'];
$jumlah = $_POST['jml'];
$i = 1;
while ($i <= $jumlah) {
    echo "$i. $kata";
    echo "<br>";
    $i++;
}
