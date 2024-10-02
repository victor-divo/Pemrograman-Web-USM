<?php
  // periksa apakah user sudah login, cek kehadiran session name 
  // jika tidak ada, redirect ke login.php
  session_start();
  if (!isset($_SESSION["nama"])) {
     header("Location: login.php");
  }
  // buka koneksi dengan MySQL
     include("connection.php");
  
  // ambil pesan jika ada  
  if (isset($_GET["pesan"])) {
      $pesan = $_GET["pesan"];
  }
     
  // cek apakah form telah di submit
  // berasal dari form pencairan, siapkan query 
  if (isset($_GET["submit"])) {
      
    // ambil nilai nama_minuman
    $nama_minuman = htmlentities(strip_tags(trim($_GET["nama_minuman"])));
    
    // filter untuk $nama_minuman untuk mencegah sql injection
    $nama_minuman = mysqli_real_escape_string($link,$nama_minuman);
    
    // buat query pencarian
    $query  = "SELECT * FROM mahasiswa WHERE nama_minuman LIKE '%$nama_minuman%' ";
    $query .= "ORDER BY nama_minuman ASC";
    
    // buat pesan 
    $pesan = "Hasil pencarian untuk nama_minuman <b>\"$nama_minuman\" </b>:";
} 
else {
// bukan dari form pencairan
// siapkan query untuk menampilkan seluruh data dari tabel mahasiswa
  $query = "SELECT * FROM mahasiswa ORDER BY nama_minuman ASC";
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
<h1 id="logo">Warung<span>Kopi</span></h1>
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
<h2>Data Mahasiswa</h2>
<?php
// tampilkan pesan jika ada
if (isset($pesan)) {
    echo "<div class=\"pesan\">$pesan</div>";
}
?>
<table border="1">
<tr> 
   <th>Product</th>
  <th>Nama Minuman</th>
  <th>Tempat Lahir</th>
  <th>Fakultas</th>
  <th>Jurusan</th>
  <th>IPK</th>
  </tr>
  <?php
  // jalankan query
  $result = mysqli_query($link, $query);
  
  if(!$result){
      die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
  
  //buat perulangan untuk element tabel dari data mahasiswa
  while($data = mysqli_fetch_assoc($result))
  { 
    echo "<tr>";
    echo "<td>$data[product]</td>";
    echo "<td>$data[nama_minuman]</td>";
    echo "<td>$data[tempat_lahir]</td>";
    echo "<td>$data[fakultas]</td>";
    echo "<td>$data[jurusan]</td>";
    echo "<td>$data[ipk]</td>";
    echo "</tr>";
  }
  
  // bebaskan memory 
  mysqli_free_result($result);
  
  // tutup koneksi dengan database mysql
  mysqli_close($link);
  ?>
  </table>
  <div id="footer">
   Copyright © <?php echo date("Y"); ?> Waroeng Kopi
  </div>
</div>
</body>
</html> 