<html>

<head>
    <title>Edit Data</title>
</head>

<body>
    <?php
    include "koneksi.php";
    $id = $_GET["id"];
    $data = mysqli_query($koneksi, "select * from kelas where id_kelas='$id'");
    $d = mysqli_fetch_array($data);
    ?>
    <h1>Edit Data</h1>
    <form method="post" action="editproses.php">
        Gedung : <input type="text" name="gedung" value="<?= $d["gedung"] ?>"> <br>
        Angka : <input type="text" name="angka" value="<?= $d["angka"] ?>"> <br>
        <input type="hidden" name="id" value="<?= $d["id_kelas"] ?>">
        <input type="submit" value="Edit">
        <a href="kelas.php">Batal</a>
    </form>
</body>

</html>