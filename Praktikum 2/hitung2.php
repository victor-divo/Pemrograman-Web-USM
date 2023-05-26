<?php
$angka1=$_post['angka_1'];
$angka2=$_post['angka_2'];

$tambah = $angka1 + $angka2;

echo "<h1>Hasil Kalkulator</h1>";
echo "Hasil Tambah : $tambah <br>";

echo "<a href='kalkulator2.php'>Kembali</a>";
?>