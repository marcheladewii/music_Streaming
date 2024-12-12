<?php
// Menghubungkan file koneksi dengan index
include("../koneksi.php");
session_start(); // Mulai sesi
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUSIC STREAMING</title>
    <style>
        /* membuat styling pada table */
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>

    <ul class="navlist">
        <li><a href="../lagu/index.php">Data Lagu</a></li>
        <li><a href="index.php">Data Pengguna</a></li>
    </ul>
    
    <h2>PENGGUNA</h2>
    <!-- Tampilkan notifikasi jika ada-->
     <?php if (isset($_SESSION['notifikasi'])): ?>
     <p><?php echo $_SESSION['notifikasi']; ?></p>
     <!-- Hapus notifikasi setelah ditampilkan -->
      <?php unset($_SESSION['notifikasi']); ?>
      <?php endif; ?> 
    <table>
        <thead>
            <tr align="center">
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th><a href="tambah_pengguna.php">Tambah Pengguna</a></th>
            </tr>
        </thead>
    <?php
    $no = 1; // Membuat penomoran pengguna dari 1
    // Membuat variabel untuk menjalankan query SQL
    $query = $db->query("SELECT * FROM pengguna");
    /* perulangan while akan terus berjalan (menampilkan pengguna) selama kondisi $query bernilai true (adanya pengguna pada table pengguna) */
    while ($pengguna = $query->fetch_assoc()) {
        /* fungsi fetch_assoc digunakan untuk mengambil data perulangan dalam bentuk array */
        ?> <!-- kode PHP ditutup untuk menyisipkan kode HTML yang akan di looping menggunakan while loop -->
        <tbody>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pengguna['username'] ?></td>
            <td><?php echo $pengguna['email'] ?></td>
            <td align="center">
                <!-- URL ke halaman edit data dengan menggunakan parameter pengguna_id pada kolom table -->
                 <a href="edit_pengguna.php?pengguna_id=<?php echo $pengguna['pengguna_id'] ?>">Edit</a>
                 <!-- URL untuk menghapus pengguna dengan parameter dengan menggunakan parameter pengguna_id pada kolom table dan alert confirmasi hapus pengguna-->
                  <a onclick="return confirm('Anda yakin ingin menghapus data?')"
                  href="hapus_pengguna.php?pengguna_id=<?php echo $pengguna['pengguna_id'] ?>">Hapus</a>
                  </td>
        </tr>
        <?php
    } /* Mengakhiri proses perulangan while yang dimulai pada baris 49 */
    ?>
        </tbody>
    </table>
      <!-- Menghitung jumlah baris yang ada pada table (pengguna) -->
       <p>Total: <?php echo mysqli_num_rows($query) ?></p>
</body>
</html>