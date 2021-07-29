<?php
include 'database.php';
if ($_POST['tambah']) {
    mysqli_query($koneksi, "INSERT INTO pengguna VALUES (NULL, '$_POST[nama]', '$_POST[alamat]', '$_POST[no_telp]', '$_POST[status]', '$_POST[username]', '$_POST[password]')");
    header("location:index.php?page=pengguna&&tambah=Pengguna baru berhasil ditambahkan");
} elseif ($_GET['del']) {
    mysqli_query($koneksi, "DELETE FROM pengguna WHERE id = '$_GET[del]'");
    header("location:index.php?page=pengguna&&del=Data pengguna berhasil dihapus");
}
