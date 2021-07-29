<?php
$no=1;
$data=mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY tanggal DESC");
 ?>

<div class="container col-md-12">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body" style="text-align:center;font-size:16px"> <b>Data Pesanan</b> </div>
    </div>
  </div>

  <div class="row">
    <?php error_reporting(0); include 'alert_pesanan.php'; ?>
    <a href="print_pesanan.php" target="_blank" class="btn btn-success btn-sm col-sm-3"><span class="glyphicon glyphicon-print"></span> Laporan Pesanan Bulan Ini</a>
    <br><br><br>
    <div class="col-sm-12">
      <table id="data-pesanan" class="table table-responsive table-bordered">
        <thead>
          <tr>
            <th style="text-align:center">No.</th>
            <th style="text-align:center">Pemesan</th>
            <th style="text-align:center">Alamat</th>
            <th style="text-align:center; width:75px">Tanggal</th>
            <th style="text-align:center">Deskripsi</th>
            <th style="text-align:center">Jumlah</th>
            <th style="text-align:center; width:100px">Total Pembayaran</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($pesanan=mysqli_fetch_array($data)) { ?>
          <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $pesanan['nama'] ?></td>
            <td><?php echo $pesanan['alamat'] ?></td>
            <td><?php echo date('d-m-Y', strtotime($pesanan['tanggal'])) ?></td>
            <td><?php echo $pesanan['deskripsi'] ?></td>
            <td style="text-align:center"><?php echo $pesanan['jumlah'] ?></td>
            <td><?php echo rupiah($pesanan['total']) ?></td>
            <td><?php echo $pesanan['status'] ?></td>
            <td style="text-align:center">
              <?php if ($pesanan['status']=='Belum Lunas'): ?>
                <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#bukti<?php echo $pesanan['id']; ?>">Bukti Transfer</a>
              <?php elseif ($pesanan['status']=='Konfirmasi'): ?>
                <a href="#" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#ongkir<?php echo $pesanan['id']; ?>">Ongkir</a>
              <?php elseif ($pesanan['status']=='Lunas'): ?>
                -
              <?php endif; ?>
            </td>
          </tr>

          <!-- MODAL ONGKIR -->
          <div class="modal fade" id="ongkir<?php echo $pesanan['id']; ?>" role="dialog">
            <?php
              $id=$pesanan['id'];
              $ongkir=mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id = '$id'"));
            ?>
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Ongkos Kirim </h4>
                </div>
                <div class="modal-body">
                  <form action="proses_pesanan.php" method="post">
                    <input hidden type="text" name="kode_psn" value="<?php echo $ongkir['kode_psn'] ?>">
                    <label for="">Masukkan Nominal Ongkos Kirim :</label>
                    <input type="text" name="ongkir" value="" class="form-control"><br>
                    <input type="submit" name="kirim" class="btn btn-info" value="Selesai">
                  </form>
                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>

          <!-- MODAL BUKTI TRANSFER -->
          <div id="bukti<?php echo $pesanan['id']; ?>" class="modal fade" role="dialog">
            <?php
              $pesan=mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id = '$pesanan[id]'"));
              $bukti=mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE kode_psn = '$pesan[kode_psn]'"));
            ?>
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Bukti Transfer</h4>
                </div>
                <div class="modal-body">
                  <img src="assets\img\<?php echo $bukti['bukti_trans'] ?>" alt="" width="400px"><hr>
                  <a href="proses_pesanan.php?konfirmasi=<?php echo $pesan['kode_psn'] ?>" class="btn btn-primary">Konfirmasi</a>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
