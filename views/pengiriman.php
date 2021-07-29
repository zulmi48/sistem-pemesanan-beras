<?php
$no=1;
$data=mysqli_query($koneksi, "SELECT * FROM pengiriman ORDER BY tanggal DESC");
 ?>

<div class="container col-md-12">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body" style="text-align:center;font-size:16px"> <b>Data Pengiriman</b> </div>
    </div>
  </div>

  <div class="row">
    <?php error_reporting(0); include 'alert_pesanan.php'; ?>
    <a href="#" class="btn btn-success btn-sm col-sm-3"><span class="glyphicon glyphicon-print"></span> Laporan Pengiriman Bulan Ini</a>
    <br><br><br>
    <div class="col-sm-12">
      <table id="data-pengiriman" class="table table-responsive table-bordered">
        <thead>
          <tr>
            <th style="text-align:center">No.</th>
            <th style="text-align:center; width:100px">Kode Pengiriman</th>
            <th style="text-align:center">Tanggal</th>
            <th style="text-align:center">Nama</th>
            <th style="text-align:center; width:100px">Alamat</th>
            <th style="text-align:center">Ongkos Kirim</th>
            <th style="text-align:center; width:100px">Status Pengiriman</th>
            <th style="text-align:center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($pengiriman=mysqli_fetch_array($data)) { ?>
          <tr>
            <td style="text-align:center"><?php echo $no++ ?></td>
            <td style="text-align:center"><?php echo $pengiriman['kode_krm'] ?></td>
            <td style="text-align:center"><?php echo date("d-M-Y", strtotime($pengiriman['tanggal'])) ?></td>
            <td style="text-align:center"><?php echo $pengiriman['nama'] ?></td>
            <td style="text-align:center"><?php echo $pengiriman['alamat'] ?></td>
            <td style="text-align:center"><?php echo rupiah($pengiriman['ongkir']) ?></td>
            <td style="text-align:center"><?php echo $pengiriman['status'] ?></td>
            <td style="text-align:center">
              <?php if ($pengiriman['status']=="Belum dikirim"): ?>
              <a href="proses_pesanan.php?kirimkan=<?php echo $pengiriman['kode_krm'] ?>" class="btn btn-sm btn-info">Kirimkan</a>
              <?php elseif ($pengiriman['status']=="Sedang dikirim"): ?>
              <a href="proses_pesanan.php?kirimkan=<?php echo $pengiriman['kode_krm'] ?>" class="btn btn-sm btn-success">Terkirim</a>
              <?php elseif ($pengiriman['status']=="Terkirim"): ?>
              - Selesai -
              <?php endif; ?>

            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
