<?php
$server = "rsigm-mysql";
$username = "rsigm";
$password = "rsigm-pass21";
$database = "weblanjut";
// Koneksi dan memilih database di server
$koneksi = mysqli_connect(
    $server,
    $username,
    $password,
    $database
) or die(mysqli_connect_error());
