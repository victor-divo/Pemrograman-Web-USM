<?php
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$semester = $_POST['semester'];
$hobi = $_POST['hobi'];

echo "<h1>Profil $nama</h1>";
echo "Halo nama saya $nama, saat ini saya kuliah semester $semester di Teknik Informatika USM dengan nim $nim. Terkadang, saya suka $hobi supaya tidak jenuh kuliah";

echo "<br><a href='datadiri.php'>Kembali</a>";
?>

