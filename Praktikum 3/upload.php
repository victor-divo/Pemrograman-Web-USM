<html>

<head>
    <title>Upload Foto</title>
</head>

<body>
    <h1>Upload Foto</h1>
    <form action="foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Upload "></td>
            </tr>
        </table>
    </form>
</body>

</html>