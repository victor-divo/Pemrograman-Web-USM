<?php
include "koneksi.php";
$query = "select * from kelas where gedung = 'Q' and angka like '1%'";
$hasil = mysqli_query($koneksi, $query);
echo "Data Kelas FTIK : <br>";
while ($data = mysqli_fetch_array($hasil)) {
    echo "$data[id_kelas]. $data[gedung] $data[angka] <br>";
}
