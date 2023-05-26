<?php
$nama = $_POST["nama"];
$jenis = $_POST["jk"];
if ($jenis == "L") {
    $gender = "Laki-Laki";
} else {
    $gender = "Perempuan";
}
echo "Halo, nama saya $nama dan saya $gender tulen";
echo "<br> <a href='kondisi.php'>Kembali</a>";
