<?php
$no=1;
$data=mysqli_query($koneksi, "SELECT pesanan.tanggal, pesanan.deskripsi, pesanan.jumlah, transaksi.total_pemasukan FROM pesanan INNER JOIN transaksi USING(kode_psn) WHERE nama = '$_SESSION[nama]'");
 ?>

<div class="container col-md-12">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body" style="text-align:center;font-size:16px"> <b>Riwayat Pembelian</b> </div>
    </div>
  </div>

  <div class="row">
    <table id="data-riwayat" class="table table-bordered" style="text-align:center">
      <thead>
        <tr>
          <th style="text-align:center">No.</th>
          <th style="text-align:center">Tanggal Pemesanan</th>
          <th style="text-align:center">Deskripsi</th>
          <th style="text-align:center">Jumlah</th>
          <th style="text-align:center">Total Pembayaran</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($riwayat=mysqli_fetch_array($data)) { ?>
        <tr>
          <td><?php echo $no ?></td>
          <td><?php echo date('d-M-Y', strtotime($riwayat['tanggal'])) ?></td>
          <td><?php echo $riwayat['deskripsi'] ?></td>
          <td><?php echo $riwayat['jumlah'] ?></td>
          <td><?php echo rupiah($riwayat['total_pemasukan']) ?></td>
        </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
  </div>

</div>
