<?php

// https://www.malasngoding.com
// menghubungkan dengan koneksi database
include 'database.php';

// mengambil data barang dengan kode paling besar
$query = mysqli_query($koneksi, "SELECT max(id) as kode FROM transaksi");
$data = mysqli_fetch_array($query);
$kodebaru = $data['kode'];


// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
// dan diubah ke integer dengan (int)
//$urutan = (int) substr($kodebaru, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$kodebaru++;

// membentuk kode barang baru
// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG
$huruf = "NSJ/Trans/";
$kodebaru = $huruf . date("m.y/"). sprintf("%03s", $kodebaru);
echo $kodebaru, date('Y-m-d');
