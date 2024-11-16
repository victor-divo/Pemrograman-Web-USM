<?php
include('Rest.php');

$obj = new Rest();

// uji coba ambil data
// $obj->getWisata();

// uji coba ambil data id tertentu
// $obj->getWisata(2);

// // uji coba tambah data
$data = [
    "id" => 5,
    "kota" => "Ungaran",
    "landmark" => "Curug Lawe",
    "tarif" => "15000"
];
// $obj->insertWisata($data);

// uji coba koreksi
// $obj->updateWisata($data);

// uji coba hapus data
// $obj->deleteWisata(9);
