<?php

session_start(); // Mulai sesi
include("../koneksi.php");

// Periksa apakah tombol "simpan" pada edit_lagu ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari form
    $lagu_id = $_POST['lagu_id'];
    $judul_lagu = $_POST['judul_lagu'];
    $artis = $_POST['artis'];
    $durasi = $_POST['durasi'];

    // Buat query untuk memperbarui data lagu
    $sql = "UPDATE lagu SET
    judul_lagu='$judul_lagu',
    artis='$artis',
    durasi='$durasi'
    WHERE lagu_id=$lagu_id";
    $query = mysqli_query($db, $sql);
    // Simpan pesan notifikasi dalam sesi berdasarkan hasil query
    if ($query) {
        $_SESSION['notifikasi'] = "Lagu berhasil diperbarui!";
    } else {
        $_SESSION['notifikasi'] = "Lagu gagal diperbarui!";
    }
    // Alihkan ke halaman index.php
    header('Location: index.php');
} else {
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>