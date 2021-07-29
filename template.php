<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';
switch ($page) {

  case 'dashboard':
  include "views/dashboard.php";
  break;

  case 'beras':
  include "views/beras.php";
  break;

  case 'pesanan':
  include "views/pesanan.php";
  break;

  case 'transaksi':
  include "views/transaksi.php";
  break;

  case 'pengiriman':
  include "views/pengiriman.php";
  break;

  case 'pengguna':
  include "views/pengguna.php";
  break;

  case 'pemesanan':
  include "views/pemesanan.php";
  break;

  case 'tambah_beras':
  include "views/tambah_beras.php";
  break;

  case 'edit_beras':
  include "views/edit_beras.php";
  break;

  case 'riwayat':
  include "views/riwayat.php";
  break;

  case 'tagihan':
  include "views/tagihan.php";
  break;

  default: // Ini untuk set default jika isi dari $page tidak ada pada 3 kondisi diatas
  include "views/dashboard.php";
}
