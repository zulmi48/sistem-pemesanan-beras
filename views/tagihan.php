<?php
$no=1;
//$data=mysqli_query($koneksi, "SELECT * FROM pesanan WHERE nama = '$_SESSION[nama]'");
$data=mysqli_query($koneksi, "SELECT pesanan.id, pesanan.kode_psn, pesanan.tanggal, pesanan.deskripsi, pesanan.jumlah, pesanan.total, pesanan.status, pengiriman.status AS stts FROM pesanan INNER JOIN pengiriman USING(kode_psn,nama) WHERE nama = '$_SESSION[nama]'");
 ?>

<div class="container col-md-12">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body" style="text-align:center;font-size:16px"> <b>Tagihan Pembayaran</b> </div>
    </div>
  </div>

  <div class="row">
    <?php error_reporting(0); include 'alert_pesanan.php'; ?>
    <table id="data-tagihan" class="table table-hover" style="text-align:center">
      <thead>
        <tr>
          <th style="text-align:center">No.</th>
          <th style="text-align:center">Kode Pesanan</th>
          <th style="text-align:center">Tanggal</th>
          <th style="text-align:center">Deskripsi</th>
          <th style="text-align:center">Jumlah</th>
          <th style="text-align:center">Tagihan</th>
          <th style="text-align:center">Status</th>
          <th style="text-align:center">Pengiriman</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($pesanan=mysqli_fetch_array($data)) { ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo $pesanan['kode_psn'] ?></td>
          <td><?php echo date('d-M-Y', strtotime($pesanan['tanggal'])) ?></td>
          <td><?php echo $pesanan['deskripsi'] ?></td>
          <td><?php echo $pesanan['jumlah'] ?></td>
          <td><?php echo rupiah($pesanan['total']) ?></td>
          <?php if ($pesanan['status']=="Konfirmasi"): ?>
          <td>Menunggu Konfirmasi / <a href="proses_pesanan.php?batal_pesan=<?php echo $pesanan['id'] ?>" class="btn btn-warning">Batal</a> </td>
          <?php elseif ($pesanan['status']=="Belum Lunas"): ?>
          <td> <a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#lunasi<?php echo $pesanan['id'] ?>">Lunasi</a> </td>
          <?php elseif ($pesanan['status']=="Lunas"): ?>
          <td>Pesanan Selesai</td>
          <?php endif; ?>
          <td><?php echo $pesanan['stts'] ?></td>
        </tr>

        <!-- MODAL UPLOAD BUKTI TRANSFER -->
        <div id="lunasi<?php echo $pesanan['id'] ?>" class="modal fade" role="dialog">
          <?php
            $bukti=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id = '$pesanan[id]'"));
           ?>
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align:center">Bukti Transfer</h4>
              </div>
              <div class="modal-body">
                <p>Silahkan Transfer tagihan ke Rekening berikut : </p>
                <p>67747364818 (BRI a/n Davis Marta)</p>
                <form enctype="multipart/form-data" action="proses_pesanan.php" method="post">
                  <div class="form-group">
                    <label for="">Upload Bukti Transfer :</label>
                    <input type="file" name="bukti_trans" value=""><br>
                    <input hidden type="text" name="kode_psn" value="<?php echo $bukti['kode_psn']; ?>">
                    <input class="btn btn-info" type="submit" name="transaksi" value="Upload">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <?php  } ?>
      </tbody>
    </table>
  </div>

</div>
