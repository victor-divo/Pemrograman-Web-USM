<?php
$angka1=$_POST['angka1'];
$angka2=$_POST['angka2'];

$tambah = $angka1 + $angka2;
$kurang = $angka1 - $angka2;
$kali = $angka1 * $angka2;
$bagi = $angka1 / $angka2;

echo "<h1>Hasil Kalkulator</h1>";
echo "Hasil Tambah : $tambah <br>";
echo "Hasil Kurang : $kurang <br>";
echo "Hasil Kali : $kali <br>";
echo "Hasil Bagi : $bagi <br>";

echo "<a href='kalkulator.php'>Kembali</a>";
?>