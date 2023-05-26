<?php
$jurusans = [
    "Teknik Informatika",
    "Sistem Informasi",
    "Ilmu Komunikasi",
    "Pariwisata Berbasis Sistem Informasi"
];
echo "<h5>Program Studi Fakultas Teknologi Informasi dan
Komunikasi:</h5>";
echo "<ul>";
foreach ($jurusans as $jurusan) {
    echo "<li>$jurusan</li>";
}
echo "</ul>";
