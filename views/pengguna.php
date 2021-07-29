<?php
$data=mysqli_query($koneksi, "SELECT * FROM pengguna ORDER BY status DESC");
$no=1;
 ?>

<div class="container col-md-12">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body" style="text-align:center;font-size:16px"> <b>Data Pengguna</b> </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <?php error_reporting(0); include 'alert_pengguna.php'; ?>
      <button type="button" style="float:right" class="btn btn-success" data-toggle="modal" data-target="#tambah">New</button><br><br>
      <table id="data-pengguna" class="table table-responsive table-bordered">
        <thead>
          <tr>
            <th style="text-align:center">No.</th>
            <th style="text-align:center">Nama</th>
            <th style="text-align:center">Alamat</th>
            <th style="text-align:center">No. Telp</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Nama Pengguna</th>
            <th style="text-align:center">Kata Sandi</th>
            <th style="text-align:center">Action</th>
          </tr>
        </thead>

        <tbody>
          <?php while ($pengguna=mysqli_fetch_array($data)) { ?>
          <tr>
            <td style="text-align:center"><?php echo $no ?></td>
            <td style="text-align:center"><?php echo $pengguna['nama'] ?></td>
            <td style="text-align:center"><?php echo $pengguna['alamat'] ?></td>
            <td style="text-align:center"><?php echo $pengguna['no_telp'] ?></td>
            <td style="text-align:center"><?php echo $pengguna['status'] ?></td>
            <td style="text-align:center"><?php echo $pengguna['username'] ?></td>
            <td style="text-align:center"> <del><?php echo $pengguna['password'] ?></del> </td>
            <td>
              <a onclick="return confirm('Yakin ingin menghapus?')" href="proses_pengguna.php?del=<?php echo $pengguna['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
          </tr>
          <?php $no++; } ?>
        </tbody>


      </table>
    </div>
  </div>
</div>


<!-- Modal -->
  <div class="modal fade" id="tambah" role="dialog">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Pengguna Baru</h4>
        </div>
        <div class="modal-body">
          <form action="proses_pengguna.php" method="post">
            <input type="text" class="form-control" name="nama" value="" placeholder="ISIKAN NAMA !" required><br>
            <textarea name="alamat" class="form-control" rows="5" cols="80" placeholder="ISIKAN ALAMAT !" required></textarea><br>
            <input type="text" name="no_telp" class="form-control" placeholder="ISIKAN NOMOR TELEPON !" value="" required><br>
            <select class="form-control" name="status">
              <option value="">SILAHKAN PILIH STATUS !</option>
              <option value="ADMIN">ADMIN</option>
              <option value="PELANGGAN">PELANGGAN</option>
            </select><br>
            <input type="text" name="username" class="form-control" placeholder="ISIKAN NAMA PENGGUNA !" value="" required><br>
            <input type="text" name="password" class="form-control" placeholder="ISIKAN KATA SANDI !" value="" required><br>
            <input type="submit" name="tambah" value="SELESAI" class="btn btn-info">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
