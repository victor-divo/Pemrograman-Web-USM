<?php
include "ceklogin.php";
include "koneksi.php";
$id=$_GET["id"];
mysqli_query($koneksi, "delete from kelas where
id_kelas='$id'");
header("Location:kelas.php");
?>