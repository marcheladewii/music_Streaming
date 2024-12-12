<?php
// Termasuk file koneksi
include("../koneksi.php");

// Mengambil pengguna_id dari parameter URL
$pengguna_id = $_GET['pengguna_id'];

// mengambil data pengguna dari database berdasarkan pengguna_id
$query = $db->query("SELECT * FROM pengguna WHERE pengguna_id = '$pengguna_id'");
$pengguna = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit pengguna</title>
</head>
<body>
  <h3>Edit pengguna</h3>
  <form action="proses_edit.php" method="POST">
    <!-- Menyimpan pengguna_id untuk proses selanjutnya -->
     <input type="hidden" name="pengguna_id" value="<?php echo $pengguna['pengguna_id']; ?>">
     <table border="0">
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username"
                value="<?php echo $pengguna['username']; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email"
                value="<?php echo $pengguna['email']; ?>"required>
            </td>
        </tr>
        </table>
        <button type="submit" name="simpan">Simpan</button>
  </form>  
</body>
</html>