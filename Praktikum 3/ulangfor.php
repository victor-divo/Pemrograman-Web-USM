<?php
$kata = $_POST["kata"];
$jumlah = $_POST["jml"];
for ($i = 1; $i <= $jumlah; $i++) {
    echo "$i. $kata";
    echo "<br>";
}
