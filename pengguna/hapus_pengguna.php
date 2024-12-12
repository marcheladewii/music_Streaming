<?php
session_start(); // Mulai sesi
include("../koneksi.php");

// Periksa apakah ada pengguna_id yang dikirimkan melalui URL
if (isset($_GET['pengguna_id'])) {
    // Ambil pengguna_id dari URL 
    $pengguna_id = $_GET['pengguna_id'];

    // Buat query untuk menghapus pengguna berdasarkan pengguna_id
    $sql = "DELETE FROM pengguna WHERE pengguna_id=$pengguna_id";
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Pengguna berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Pengguna gagal dihapus!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa pengguna_id, tampilkan pesan error
    die("Akses ditolak..");
}
?>