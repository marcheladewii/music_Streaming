<?php

session_start(); // Mulai sesi
include("../koneksi.php");

// Periksa apakah tombol "simpan" pada edit_pengguna ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $pengguna_id = $_POST['pengguna_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Buat query untuk memperbarui data pengguna
    $sql = "UPDATE pengguna SET
    username='$username',
    email='$email'
    WHERE pengguna_id=$pengguna_id";
    $query = mysqli_query($db, $sql);
    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Pengguna berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Pengguna gagal diperbarui!";
    }
    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>