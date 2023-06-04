<?php
include "ceklogin.php";
?>
<html>

<head>
    <title>Tambah Data</title>
</head>

<body>
    <h1>Tambah Data</h1>
    <form method="post" action="tambahproses.php">
        Gedung : <input type="text" name="gedung"> <br>
        Angka : <input type="text" name="angka"> <br>
        <input type="submit" value="Tambah">
        <a href="kelas.php">Batal</a>
    </form>
</body>

</html>