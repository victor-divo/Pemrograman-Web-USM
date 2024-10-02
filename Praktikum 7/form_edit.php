<?php
  // periksa apakah user sudah login, cek kehadiran session name
  // jika tidak ada, redirect ke login.php
  session_start();
  if (!isset($_SESSION["nama"])) {
     header("Location: login.php");
  }

  // buka koneksi dengan MySQL
  include("connection.php");

  // cek apakah form telah di submit
  if (isset($_POST["submit"])) {
    // form telah disubmit, cek apakah berasal dari edit_mahasiswa.php
    // atau update data dari form_edit.php

    if ($_POST["submit"]=="Edit") {
      //product form berasal dari halaman edit_mahasiswa.php

      // ambil nilai product
      $product = htmlentities(strip_tags(trim($_POST["product"])));
      // filter data
      $product = mysqli_real_escape_string($link,$product);

      // ambil semua data dari database untuk menjadi product awal form
      $query = "SELECT * FROM mahasiswa WHERE product='$product'";
      $result = mysqli_query($link, $query);

      if(!$result){ 
        die ("Query Error: ".mysqli_errno($link).
        " - ".mysqli_error($link));
 }

 // tidak perlu pakai perulangan while, karena hanya ada 1 record
 $data = mysqli_fetch_assoc($result);

 $nama_minuman = $data["nama_minuman"];
 $request      = $data["request"];
 $nama         = $data["nama"];
 $jurusan      = $data["jurusan"];
 $ipk          = $data["ipk"];

// bebaskan memory
mysqli_free_result($result);
}

else if ($_POST["submit"]=="Update Data") {
 // nilai form berasal dari halaman form_edit.php
 // ambil semua nilai form
 $product      = htmlentities(strip_tags(trim($_POST["product"])));
 $nama_minuman = htmlentities(strip_tags(trim($_POST["nama_minuman"])));
 $request      = htmlentities(strip_tags(trim($_POST["request"])));
 $nama         = htmlentities(strip_tags(trim($_POST["nama"])));
 $jurusan      = htmlentities(strip_tags(trim($_POST["jurusan"])));
 $ipk          = htmlentities(strip_tags(trim($_POST["ipk"])));
}

// proses validasi form
// siapkan variabel untuk menampung pesan error
$pesan_error="";

// cek apakah "product" sudah diisi atau tidak
if (empty($product)) {
 $pesan_error .= "product belum diisi <br>";
}
// product harus angka dengan 8 digit
elseif (!preg_match("/^[0-9]{8}$/",$product) ) {
 $pesan_error .= "product harus berupa 8 digit angka <br>";
} 
 // cek apakah "nama minuman" sudah diisi atau tidak
 if (empty($nama_minuman)) {
    $pesan_error .= "Nama Minuman belum diisi <br>";
  }

  // cek apakah "request" sudah diisi atau tidak
  if (empty($request)) {
    $pesan_error .= "Request belum diisi <br>";
  }

  // cek apakah "nama" sudah diisi atau tidak
  if (empty($nama)) {
    $pesan_error .= "Nama belum diisi <br>";
  }

  // siapkan variabel untuk menggenerate pilihan fakultas
  $select_kedokteran=""; $select_fmipa=""; $select_ekonomi="";
  $select_teknik=""; $select_sastra=""; $select_fasilkom="";

  switch($fakultas) {
   case "Kedokteran" : $select_kedokteran = "selected";  break;
   case "FMIPA"      : $select_fmipa      = "selected";  break;
   case "Ekonomi"    : $select_ekonomi    = "selected";  break;
   case "Teknik"     : $select_teknik     = "selected";  break;
   case "Sastra"     : $select_sastra     = "selected";  break;
   case "FASILKOM"   : $select_mysql      = "selected";  break;
  }

  // IPK harus berupa angka dan tidak boleh negatif
  if (!is_numeric($ipk) OR ($ipk <=0)) {
    $pesan_error .= "IPK harus diisi dengan angka";
  }

  // jika tidak ada error, input ke database
  if (($pesan_error === "") AND ($_POST["submit"]=="Update Data")) {

    // buka koneksi dengan MySQL
    include("connection.php");

    // filter semua data
    $product      = mysqli_real_escape_string($link,$product);
    $nama_minuman = mysqli_real_escape_string($link,$nama_minuman);
    $request      = mysqli_real_escape_string($link,$request);
    $nama         = mysqli_real_escape_string($link,$nama);
    $jurusan      = mysqli_real_escape_string($link,$jurusan);
    $ipk          = (float) $ipk;


    //buat dan jalankan query UPDATE
    $query  = "UPDATE mahasiswa SET ";
    $query .= "nama_minuman = '$nama_minuman', tempat_lahir = '$request', ";
    $query .= "fakultas='$fakultas'";
    $query .= "jurusan = '$jurusan', ipk='$ipk'";
    $query .= "WHERE product = '$product'";

    $result = mysqli_query($link, $query);

    //periksa hasil query
    if($result) {
    // INSERT berhasil, redirect ke tampil_mahasiswa.php + pesan
      $pesan = "Mahasiswa dengan nama = \"<b>$nama</b>\" sudah berhasil di update";
      $pesan = urlencode($pesan);
      header("Location: tampil_mahasiswa.php?pesan={$pesan}");
    }
    else {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
  }
}
else {
  // form diakses secara langsung!
  // redirect ke edit_mahasiswa.php
  header("Location: edit_mahasiswa.php");
}
                  ?>
                  <!DOCTYPE html>
                  <html lang="id">
                  <head>
                    <meta charset="UTF-8">
                    <title>Warung Kopi</title>
                    <link href="style.css" rel="stylesheet" >
                    <link rel="icon" href="favicon.png" type="image/png" >
                  </head>
                  <body>
                  <div class="container">
                  <div id="header">
                    <h1 id="logo">Warung <span>Kopi</span></h1>
                    <p id="tanggal"><?php echo date("d M Y"); ?></p>
                  </div>
                  <hr>
                    <nav>
                    <ul>
                      <li><a href="tampil_mahasiswa.php">Tampil</a></li>
                      <li><a href="tambah_mahasiswa.php">Tambah</a>
                      <li><a href="edit_mahasiswa.php">Edit</a>
                      <li><a href="hapus_mahasiswa.php">Hapus</a></li>
                      <li><a href="logout.php">Logout</a>
                    </ul>
                    </nav>
                    <form id="search" action="tampil_mahasiswa.php" method="get">
                      <p>
                        <label for="product">Nama : </label>
                        <input type="text" name="nama" id="nama" placeholder="search..." >
                        <input type="submit" name="submit" value="Search">
                      </p>
                    </form>
                  <h2>Edit Data Mahasiswa</h2>
                  <?php
                    // tampilkan error jika ada
                    if ($pesan_error !== "") {
                        echo "<div class=\"error\">$pesan_error</div>";
                    }
                  ?>
                  <form id="form_mahasiswa" action="form_edit.php" method="post">
                  <fieldset>
                  <legend>Mahasiswa Baru</legend>
                    <p>
                      <label for="product">product : </label>
                      <input type="text" name="product" id="product" value="<?php echo $product ?>" readonly>
                      (tidak bisa diubah di menu edit)
                    </p> 
                    <p>
    <label for="nama_minuman">Nama Minuman : </label>
    <input type="text" name="nama_minuman" id="nama_minuman" value="<?php echo $nama_minuman ?>">
  </p>
      <p>
        <label for="fakultas" >Fakultas : </label>
          <select name="fakultas" id="fakultas">
            <option value="Kedokteran" <?php echo $select_kedokteran ?>>
            Kedokteran </option>
            <option value="FMIPA" <?php echo $select_fmipa ?>>
            FMIPA</option>
            <option value="Ekonomi" <?php echo $select_ekonomi ?>>
            Ekonomi</option>
            <option value="Teknik" <?php echo $select_teknik ?>>
            Teknik</option>
            <option value="Sastra" <?php echo $select_sastra ?>>
            Sastra</option>
            <option value="FASILKOM" <?php echo $select_fasilkom ?>>
            FASILKOM</option>
          </select>
      </p>
      <p>
        <label for="jurusan">Jurusan : </label>
        <input type="text" name="jurusan" id="jurusan" value="<?php echo $jurusan?>">
      </p>
      <p >
        <label for="ipk">IPK : </label>
        <input type="text" name="ipk" id="ipk" value="<?php echo $ipk ?>">
        (angka desimal dipisah dengan karakter titik ".")
      </p>
    
    </fieldset>
      <br>
      <p>
        <input type="submit" name="submit" value="Update Data">
      </p>
    </form>
    
    </div>
    
    </body>
    </html>
    <?php
      // tutup koneksi dengan database mysql
      mysqli_close($link);
    ?>
    