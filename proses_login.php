<?php
session_start();
include 'database.php';
$data=mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username = '$_POST[username]' AND password = '$_POST[password]'");
$cek=mysqli_num_rows($data);

if ($_POST['login']) {
    if ($cek > 0) {
        $pengguna=mysqli_fetch_array($data);
        if ($pengguna['status']=="ADMIN") {
            $_SESSION['nama'] = $pengguna['nama'];
            $_SESSION['status'] = $pengguna['status'];
            header("location:index.php");
        } elseif ($pengguna['status']=="PELANGGAN") {
            $_SESSION['nama'] = $pengguna['nama'];
            $_SESSION['status'] = $pengguna['status'];
            header("location:index.php?page=beras");
        }
    } else {
        header("location:login.php?alert=Pastikan Username dan Password Anda Benar!");
    }
} elseif ($_GET['logout']) {
    session_start();
    session_destroy();
    header("location:index.php");
}
