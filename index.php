<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UD. Ndaru Sri Jaya</title>
  <!-- Bootstrap Styles-->
  <link href="assets\css\bootstrap.css" rel="stylesheet" />
  <!-- Data Table Styles-->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
  <!-- FontAwesome Styles-->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom Styles-->
  <link href="assets\css\custom-styles.css" rel="stylesheet" />
  <!-- Chart JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  <!-- Google Fonts-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <?php include 'database.php'; include 'rupiah.php'; ?>

</head>

<body>
  <?php
    session_start();
    if (empty($_SESSION['status'])) {
        header("location:login.php");
    }
   ?>
  <div id="wrapper">
    <nav class="navbar navbar-default top-navbar" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" style="font-size:15px" href="#">UD. NDARU SRI JAYA</a>
      </div>
      <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            <?php echo $_SESSION['nama'] ?> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li><a href="proses_login.php?logout=yes"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
          <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
      </ul>
    </nav>
    <!--/. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <?php if ($_SESSION['status']=="ADMIN"): ?>
          <li>
            <a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <?php endif; ?>
          <li>
            <a href="index.php?page=beras"><i class="fa fa-archive"></i> Beras</a>
          </li>
          <?php if ($_SESSION['status']=="PELANGGAN"): ?>
            <li>
              <a href="index.php?page=tagihan"><i class="fa fa-shopping-cart"></i> Tagihan Pembayaran</a>
            </li>
            <li>
              <a href="index.php?page=riwayat"><i class="fa fa-history"></i> Riwayat Pembelian</a>
            </li>
          <?php endif; ?>
          <?php if ($_SESSION['status']=="ADMIN"): ?>
          <li>
            <a href="index.php?page=pesanan"><i class="fa fa-envelope"></i> Pesanan</a>
          </li>
          <li>
            <a href="index.php?page=transaksi"><i class="fa fa-credit-card"></i> Transaksi</a>
          </li>
          <li>
            <a href="index.php?page=pengiriman"><i class="fa fa-truck"></i> Pengiriman</a>
          </li>
          <li>
            <a href="index.php?page=pengguna"><i class="fa fa-users"></i> Data Pengguna</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
      <?php include 'template.php'; ?>
      <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
</body>

<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
  $('#data-pesanan').DataTable();
  $('#data-transaksi').DataTable();
  $('#data-pengiriman').DataTable();
  $('#data-pengguna').DataTable();
  $('#data-tagihan').DataTable();
  $('#data-riwayat').DataTable();
} );
</script>


</html>
