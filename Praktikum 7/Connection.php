<?php
  // buat koneksi dengan database mysql
  $dbhost = "rsigm-mysql";
  $dbuser = "rsigm";
  $dbpass = "rsigm-pass21";
  $dbname = "kampusku";
  $link = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
  
  //periksa koneksi, tampilkan pesan kesalahan jika gagal
  if(!$link){
    die ("Koneksi dengan database gagal: ".mysqli_connect_errno().
         " - ".mysqli_connect_error());
  }
