<?php
$nim = $_POST["nim"];
$nama = $_POST["nama"];
$pd = $_POST["ps"];
if ($pd == "IK") {
    $progdi = "Ilmu Komunikasi";
} elseif ($pd == "SI") {
    $progdi = "Sistem Informasi";
} elseif ($pd == "P") {
    $progdi = "Pariwisata";
} elseif ($pd == "TI") {
    $progdi = "Teknik Informatika";
} 
echo "Halo, nama saya $nama dan saya mempunyai nim $nim saya kuliah di USM dengan Program Studi $progdi";
echo "<br> <a href='kondisiadv.php'>Kembali</a>";
