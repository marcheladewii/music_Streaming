<?php
session_start(); // Mulai sesi
include("../koneksi.php");

// Periksa apakah ada lagu_id yang dikirimkan melalui URL
if (isset($_GET['lagu_id'])) {
    // Ambil lagu_id dari URL 
    $lagu_id = $_GET['lagu_id'];

    // Buat query untuk menghapus lagu berdasarkan lagu_id
    $sql = "DELETE FROM lagu WHERE lagu_id=$lagu_id";
    $query = mysqli_query($db, $sql);

    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Lagu berhasil dihapus!";
    } else {
        $_SESSION['notifikasi'] = "Lagu gagal dihapus!";
    }

    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa lagu_id, tampilkan pesan error
    die("Akses ditolak..");
}
?>