<?php
$no=1;
$data=mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY tanggal DESC");
 ?>

<div class="container col-md-12">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body" style="text-align:center;font-size:16px"> <b>Data Transaksi</b> </div>
    </div>
  </div>

  <div class="row">
    <?php error_reporting(0); include 'alert_pesanan.php'; ?>
    <a href="print_transaksi.php" target="_blank" class="btn btn-success btn-sm col-sm-3"><span class="glyphicon glyphicon-print"></span> Laporan Transaksi Bulan Ini</a>
    <br><br><br>
    <div class="col-sm-12">
      <table id="data-transaksi" class="table table-responsive table-bordered">
        <thead>
          <tr>
            <th style="text-align:center">No.</th>
            <th style="text-align:center">Tanggal</th>
            <th style="text-align:center">Kode Pesanan</th>
            <th style="text-align:center">Total</th>
            <th style="text-align:center">Ongkos Kirim</th>
            <th style="text-align:center">Total Pemasukan</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($trans=mysqli_fetch_array($data)) { ?>
          <tr>
            <td style="text-align:center"><?php echo $no++ ?></td>
            <td style="text-align:center"><?php echo date('d-M-Y', strtotime($trans['tanggal'])) ?></td>
            <td style="text-align:center"><?php echo $trans['kode_psn'] ?></td>
            <td style="text-align:center"><?php echo rupiah($trans['total']) ?></td>
            <td style="text-align:center"><?php echo rupiah($trans['ongkir']) ?></td>
            <td style="text-align:center"><?php echo rupiah($trans['total_pemasukan']) ?></td>
          </tr>
          <?php } ?>
        </tbody>

      </table>
    </div>
  </div>

  <div class="row">
    <ul style="position:absolute;left:43%" class="pagination col-sm-5">
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
    </ul>
  </div>
</div>
