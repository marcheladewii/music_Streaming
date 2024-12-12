<?php

session_start(); // Mulai sesi
// Menghubungkan file ini dengan file koneksi database
include("../koneksi.php");

// Mengecek apakah tombol 'simpan' telah ditekan
if(isset($_POST['simpan'])) {
    /* mengambil nilai dari tambah pengguna dan menyimpannya ke dalam variabel */
    $username = $_POST['username'];
    $email = $_POST['email'];

    /* Menyusun query SQL untuk menambahkan pengguna ke table 'pengguna' */
    $sql = "INSERT INTO pengguna 
    (username, email)
    VALUES ('$username','$email')";

    // Menjalankan query dan menyimpan hasilnya dalam variabel $query
    $query = mysqli_query($db, $sql);

    // Simpan pesan di sesi
    if ($query) {
        $_SESSION['notifikasi'] = "Pengguna berhasil ditambahkan!";
    } else {
        $_SESSION['notifikasi'] = "Pengguna gagal ditambahkan!";
    }
    // Alihkan ke halaman index.php
    header('Location: index.php');
    // Jika akses langsung tanpa form, tampilkan pesan error
    die("Akses ditolak...");
}
?>