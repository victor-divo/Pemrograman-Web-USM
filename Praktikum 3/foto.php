<?php
$nama = $_POST["nama"];
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file = $_FILES['foto']['name'];
move_uploaded_file($lokasi_file, "foto/$nama_file");
?>
Judul : <?= $nama ?> <br>
<img src="foto/<?= $nama_file ?>">
<a href="upload.php">Upload Lagi</a>