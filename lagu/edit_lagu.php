<?php
// Termasuk file koneksi
include("../koneksi.php");

// Mengambil lagu_id dari parameter URL
$lagu_id = $_GET['lagu_id'];

// mengambil data lagu dari database berdasarkan lagu_id
$query = $db->query("SELECT * FROM lagu WHERE lagu_id = '$lagu_id'");
$lagu = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lagu</title>
</head>
<body>
  <h3>Edit Lagu</h3>
  <form action="proses_edit.php" method="POST">
    <!-- Menyimpan lagu_id untuk proses selanjutnya -->
     <input type="hidden" name="lagu_id" value="<?php echo $lagu['lagu_id']; ?>">
     <table border="0">
        <tr>
            <td>Judul Lagu</td>
            <td>
                <input type="text" name="judul_lagu"
                value="<?php echo $lagu['judul_lagu']; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Artis</td>
            <td>
                <input type="text" name="artis"
                value="<?php echo $lagu['artis']; ?>"required>
            </td>
        </tr>
        <tr>
            <td>Durasi</td>
            <td>
                <input type="text" name="durasi"
                value="<?php echo $lagu['durasi']; ?>"required>
            </td>
        </tr>   
        </table>
        <button type="submit" name="simpan">Simpan</button>
  </form>  
</body>
</html>