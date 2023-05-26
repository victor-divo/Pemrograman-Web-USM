<?php
include "koneksi.php";
$query = "select * from kelas where angka like '3%'";
$hasil = mysqli_query($koneksi, $query);
echo "Data Kelas FTIK : <br>";
while ($data = mysqli_fetch_array($hasil)) {
    echo "$data[id_kelas]. $data[gedung] $data[angka] <br>";
}
