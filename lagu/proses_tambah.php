<?php

session_start(); // Mulai sesi
// Menghubungkan file ini dengan file koneksi database
include("../koneksi.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])) {
    /* mengambil nilai dari tambah lagu dan menyimpannya ke dalam variabel */
    $judul_lagu = $_POST['judul_lagu'];
    $artis = $_POST['artis'];
    $durasi = $_POST['durasi'];

    /* Menyusun query SQL untuk menambahkan lagu ke table 'lagu' */
    $sql = "INSERT INTO lagu 
    (judul_lagu, artis, durasi)
    VALUES ('$judul_lagu','$artis','$durasi')";

    // Menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Lagu berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Lagu gagal ditambahkan!";
    }
    // Alihkan ke halaman index.php
    header('Location: index.php');
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>