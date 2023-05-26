<html>

<head>
    <title>Kondisi</title>
</head>

<body>
    <h1>Cek Kondisi</h1>
    <form action="genderadv.php" method="post">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>
                    <input type="radio" name="ps" value="IK"> Ilmu Komunikasi <br>
                    <input type="radio" name="ps" value="SI"> Sistem Informasi<br>
                    <input type="radio" name="ps" value="P"> Pariwisata<br>
                    <input type="radio" name="ps" value="TI"> Teknik Informatika
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="OK"></td>
            </tr>
        </table>
    </form>
</body>

</html>