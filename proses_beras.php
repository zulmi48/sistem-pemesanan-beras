<?php
include 'database.php';
if ($_POST['tambah_beras']) {
    $nama_gbr=$_FILES['pic']['name'];
    $tmp_gbr=$_FILES['pic']['tmp_name'];
    move_uploaded_file($tmp_gbr, 'assets/img/'.$nama_gbr);
    echo "$nama_gbr";
    mysqli_query($koneksi, "INSERT INTO beras VALUES (NULL, '$_POST[jenis]','$_POST[harga]','$_POST[stok]', '$_POST[deskripsi]', '$nama_gbr')");
    header("location:index.php?page=beras&&tambah=Data baru berhasil ditambahkan");
} elseif ($_POST['edit_beras']) {
    $nama_gbr=$_FILES['pic']['name'];
    $tmp_gbr=$_FILES['pic']['tmp_name'];
    move_uploaded_file($tmp_gbr, 'assets/img/'.$nama_gbr);
    if ($nama_gbr=="") {
        mysqli_query($koneksi, "UPDATE beras SET jenis = '$_POST[jenis]', harga = '$_POST[harga]', stok = '$_POST[stok]', deskripsi = '$_POST[deskripsi]' WHERE id ='$_POST[id]'");
        header("location:index.php?page=beras&&edit=Data berhasil diperbaharui");
    } else {
        move_uploaded_file($tmp_gbr, 'assets/img/'.$nama_gbr);
        mysqli_query($koneksi, "UPDATE beras SET jenis = '$_POST[jenis]', harga = '$_POST[harga]', stok = '$_POST[stok]', deskripsi = '$_POST[deskripsi]', pic = '$nama_gbr' WHERE id ='$_POST[id]'");
        header("location:index.php?page=beras&&edit=Data berhasil diperbaharui");
    }
} elseif ($_GET['hapus']) {
    mysqli_query($koneksi, "DELETE FROM beras WHERE id = '$_GET[hapus]'");
    header("location:index.php?page=beras&&hapus=Data berhasil dihapus");
}
