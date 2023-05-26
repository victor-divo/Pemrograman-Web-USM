<html>

<head>
    <title>Kondisi</title>
</head>

<body>
    <h1>Cek Kondisi</h1>
    <form action="gender.php" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="radio" name="jk" value="L"> Laki-Laki <br>
                    <input type="radio" name="jk" value="P"> Perempuan
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="OK"></td>
            </tr>
        </table>
    </form>
</body>

</html>