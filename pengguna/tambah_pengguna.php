<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Streaming</title>
</head>
<body>
    <h3>Tambah Pengguna</h3>
    <form action="proses_tambah.php" method="POST">
        <table border="0">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" required></td>
            </tr>
            </table>
        <button type="submit" name="simpan">Simpan</button>
    </form>
</body>
</html>