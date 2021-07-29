<?php
include 'database.php';
if ($_POST['pesan']) {
    $data=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM beras WHERE jenis = '$_POST[deskripsi]'"));
    $sisa=$data['stok']-$_POST['jumlah'];
    if ($_POST['jumlah'] > $data['stok']) {
        header("location:index.php?page=beras&&gagal=Jumlah yang dipesan melebihi stok, Silahkan pilih kembali");
    } else {
        mysqli_query($koneksi, "INSERT INTO pesanan VALUES (NULL, '$_POST[kode_psn]', '$_POST[tanggal]', '$_POST[nama]', '$_POST[alamat]', '$_POST[deskripsi]', '$_POST[jumlah]', '$_POST[total]', 'Konfirmasi')");
        mysqli_query($koneksi, "UPDATE beras SET stok = '$sisa' WHERE jenis = '$_POST[deskripsi]'");
        header("location:index.php?page=beras&&sukses=Pesanan telah dibuat, Silahkan lunasi pembayaran");
    }
} elseif ($_GET['batal_pesan']) {
    mysqli_query($koneksi, "DELETE FROM pesanan WHERE id = '$_GET[batal_pesan]'");
    header("location:index.php?page=tagihan&&batal=Pesanan berhasil dibatalkan");
} elseif ($_POST['kirim']) {
    // --- KODE PENGIRIMAN --- //
    $kodelama = mysqli_fetch_array(mysqli_query($koneksi, "SELECT max(id) as kode FROM pengiriman"));
    $kodebaru = $kodelama['kode'];
    $kodebaru++;
    $huruf = "NSJ/KRM/";
    $kodebaru = $huruf . date("m.y/"). sprintf("%03s", $kodebaru);
    $tanggal = date("Y-m-d");
    // --- END --- //
    $pesanan=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pesanan WHERE kode_psn = '$_POST[kode_psn]'"));
    $total_semua=$_POST['ongkir'] + $pesanan['total'];
    mysqli_query($koneksi, "INSERT INTO pengiriman VALUES(NULL, '$kodebaru', '$pesanan[kode_psn]', '$tanggal', '$pesanan[nama]', '$pesanan[alamat]', '$_POST[ongkir]', 'Belum dikirim')");
    mysqli_query($koneksi, "UPDATE pesanan SET status = 'Belum Lunas', total = '$total_semua' WHERE kode_psn = '$_POST[kode_psn]' ");
    header("location:index.php?page=pesanan&&kirim=Tagihan telah dikirim ke Pemesan");
} elseif ($_POST['transaksi']) {
    $nama_gbr=$_FILES['bukti_trans']['name'];
    $tmp_gbr=$_FILES['bukti_trans']['tmp_name'];
    move_uploaded_file($tmp_gbr, 'assets/img/'.$nama_gbr);
    // --- KODE TRANSAKSI --- //
    $kodelama = mysqli_fetch_array(mysqli_query($koneksi, "SELECT max(id) as kode FROM transaksi"));
    $kodebaru = $kodelama['kode'];
    $kodebaru++;
    $huruf = "NSJ/Trans/";
    $kodebaru = $huruf . date("m.y/"). sprintf("%03s", $kodebaru);
    $tanggal = date("Y-m-d");
    // --- END --- //
    if (empty($_FILES['bukti_trans']['name'])) {
        header("location:index.php?page=tagihan&&transaksi=Bukti transfer belum terUpload");
    } else {
        mysqli_query($koneksi, "INSERT INTO transaksi VALUES (NULL, '$kodebaru', '', '$_POST[kode_psn]', '', '', '', '$nama_gbr')");
        header("location:index.php?page=tagihan&&transaksi=Bukti transaksi sudah diUpload silahkan tunggu konfirmasi");
    }
} elseif ($_GET['konfirmasi']) {
    $konfirmasi=mysqli_fetch_array(mysqli_query($koneksi, "SELECT pesanan.total, pengiriman.ongkir FROM pesanan INNER JOIN pengiriman USING(kode_psn) WHERE kode_psn = '$_GET[konfirmasi]'"));
    $tanggal = date('Y-m-d');
    $total = $konfirmasi['total'] - $konfirmasi['ongkir'];
    mysqli_query($koneksi, "UPDATE pesanan SET status = 'Lunas' WHERE kode_psn = '$_GET[konfirmasi]'");
    mysqli_query($koneksi, "UPDATE transaksi SET tanggal = '$tanggal', total = '$total', ongkir = '$konfirmasi[ongkir]', total_pemasukan = '$konfirmasi[total]' WHERE kode_psn = '$_GET[konfirmasi]'");
    header("location:index.php?page=transaksi&&konfirmasi=Data transaksi telah ditambahkan");
} elseif ($_GET['kirimkan']) {
    $status=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pengiriman WHERE kode_krm = '$_GET[kirimkan]'"));
    if ($status['status']=="Belum dikirim") {
        mysqli_query($koneksi, "UPDATE pengiriman SET status = 'Sedang dikirim' WHERE kode_krm = '$_GET[kirimkan]'");
        header("location:index.php?page=pengiriman&&kirimkan=Pesanan sedang dalam proses pengiriman");
    } elseif ($status['status']=="Sedang dikirim") {
        mysqli_query($koneksi, "UPDATE pengiriman SET status = 'Terkirim' WHERE kode_krm = '$_GET[kirimkan]'");
        header("location:index.php?page=pengiriman&&kirimkan=Pesanan telah sampai ke tujuan");
    }
}
