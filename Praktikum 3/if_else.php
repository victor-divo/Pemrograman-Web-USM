<?php
// nama file : if_else.php
$nilai = 50;
// if ($nilai >= 60) {
//     echo "Nilai Anda $nilai, Anda LULUS";
// } else {
//     echo "Nilai Anda $nilai, Anda GAGAL";
// }

if ($nilai >= 80) {
    echo "Nilai Anda $nilai, Anda LULUS dengan predikat A";
} elseif ($nilai >= 70) {
    echo "Nilai Anda $nilai, Anda LULUS dengan predikat B";
} elseif ($nilai >= 60) {
    echo "Nilai Anda $nilai, Anda LULUS dengan predikat C";
} else {
    echo "Nilai Anda $nilai, Anda Tidak Lulus";
}
?>