<?php
include "koneksi.php";
$id=$_POST["id"];
$angka=$_POST["angka"];
$gedung=$_POST["gedung"];
mysqli_query($koneksi, "update kelas set gedung = '$gedung'
,
angka = '$angka'
where id_kelas = '$id'");
header("Location:kelas.php");
?>
