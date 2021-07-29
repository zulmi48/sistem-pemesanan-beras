<?php
  error_reporting(0);

  $batas = 2;
  $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
  $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

  $previous = $halaman - 1;
  $next = $halaman + 1;

  $data_beras=mysqli_query($koneksi, "SELECT * FROM beras");
  $jumlah_data = mysqli_num_rows($data_beras);
  $total_halaman = ceil($jumlah_data / $batas);

  $data = mysqli_query($koneksi, "SELECT * FROM beras limit $halaman_awal, $batas");
  $nomor = $halaman_awal+1;
 ?>

<div class="container col-md-12">
  <div class="row">
    <div class="panel panel-default col-sm-12">
      <div class="panel-body" style="text-align:center;font-size:16px"> <b>Data Beras</b> </div>
    </div>
    <div class="input-group col-sm-4" style="float:right">
      <input id="search" type="text" class="form-control" placeholder="Search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit">
          <i class="glyphicon glyphicon-search"></i>
        </button>
      </div>
    </div>
    <?php if ($_SESSION['status']=="ADMIN"): ?>
    <a href="index.php?page=tambah_beras" class="btn btn-success">Tambah Data</a>
    <?php endif; ?>
  </div><br>

  <div class="row" id="tampil">
    <?php include 'alert_beras.php'; ?>
    <?php while ($beras=mysqli_fetch_array($data)) { ?>
    <div class="col-sm-6">
      <div class="thumbnail">
        <a href="assets\img\<?php echo $beras['pic'] ?>"><img src="assets\img\<?php echo $beras['pic'] ?>" alt="Lights" style="height: 300px"></a>
        <div class="caption">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th>Jenis Beras</th>
                <th>:</th>
                <th><?php echo $beras['jenis'] ?></th>
              </tr>
              <tr>
                <th>Harga Beras @25kg</th>
                <th>:</th>
                <th><?php echo rupiah($beras['harga']) ?></th>
              </tr>
              <tr>
                <th>Stok Beras</th>
                <th>:</th>
                <th><?php echo $beras['stok'] ?></th>
              </tr>
              <tr>
                <th>Deskripsi Beras</th>
                <th>:</th>
                <th><?php echo $beras['deskripsi'] ?></th>
              </tr>
              <tr>
                <th colspan="3">
                  <?php if ($_SESSION['status']=="PELANGGAN"): ?>
                  <a href="index.php?page=pemesanan&&id=<?php echo $beras['id'] ?>" class="btn btn-block btn-success">BELI</a>
                  <?php endif; ?>

                  <?php if ($_SESSION['status']=="ADMIN"): ?>
                  <a href="index.php?page=edit_beras&&id=<?php echo $beras['id'] ?>" style="float:left" class="btn btn-warning">Edit Data</a>
                  <a onclick="return confirm('Yakin ingin dihapus?')" href="proses_beras.php?hapus=<?php echo $beras['id'] ?>" style="float:right" class="btn btn-danger">Hapus Data</a>
                  <?php endif; ?>

                </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <div class="row">
    <ul style="position:absolute;left:43%" class="pagination col-sm-5">
      <?php  for ($x=1;$x<=$total_halaman;$x++) {  ?>
      <li class="page-item"><a class="page-link" href="index.php?page=beras&&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
      <?php  }   ?>
    </ul>
  </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#search').on('keyup', function() {
      $.ajax({
        type: 'POST',
        url: 'search.php',
        data: {
          search: $(this).val()
        },
        cache: false,
        success: function(data) {
          $('#tampil').html(data);
        }
      });
    });
  });
</script>
