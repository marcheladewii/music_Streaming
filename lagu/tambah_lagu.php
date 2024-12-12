<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Streaming</title>
</head>
<body>
    <h3>Tambah Lagu</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Judul Lagu</td>
                <td><input type="text" name="judul_lagu" required></td>
            </tr>
            <tr>
                <td>Artis</td>
                <td><input type="text" name="artis" required></td>
            </tr>
            <tr>
                <td>Durasi</td>
                <td><input type="text" name="durasi" required></td>
            </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>