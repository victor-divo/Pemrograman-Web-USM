<?php
include "koneksi.php";
$query = "select * from kelas";
$hasil = mysqli_query($koneksi, $query);
echo "Data Kelas FTIK : <br>";
echo "<a href='tambah.php'>Tambah Data</a> <br>";
while ($data = mysqli_fetch_array($hasil)) {
    echo "$data[id_kelas]. $data[gedung] $data[angka] :: ";
    echo "<a href='edit.php?id=$data[id_kelas]'>Edit</a> |
<a href='hapus.php?id=$data[id_kelas]'>Hapus<a/> <br>";
}
?>