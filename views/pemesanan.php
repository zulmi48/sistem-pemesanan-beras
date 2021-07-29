<?php
  $pesan=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM beras INNER JOIN pengguna WHERE beras.id = '$_GET[id]' AND pengguna.nama = '$_SESSION[nama]'"));
  // -- MEMBUAT KODE OTOMATIS -- //
  $kodelama=mysqli_fetch_array(mysqli_query($koneksi, "SELECT max(id) as kode FROM pesanan"));
  $kodebaru=$kodelama['kode'];
  $kodebaru++;
  $huruf = "NSJ/PSN/";
  $kodebaru = $huruf . date("m.y/"). sprintf("%03s", $kodebaru);
  // -- END -- //
 ?>

<div class="container col-md-12">
  <div class="row">
    <div class="row">
      <a href="index.php?page=beras" class="btn btn-default">Kembali <i class="fa fa-mail-reply"></i> </a><br><br>
      <div class="panel panel-default">
        <div class="panel-body" style="text-align:center;font-size:16px"> <b>Form Pemesanan</b> </div>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-sm-4" style="position:absolute">
        <form action="proses_pesanan.php" method="post">
          <label for="">Kode Pesanan : </label>
          <input class="form-control" type="text" name="kode_psn" value="<?php echo $kodebaru ?>" readonly><br>
          <label for="">Tanggal : </label>
          <input readonly class="form-control" type="text" name="tanggal" value="<?php echo date('Y-m-d') ?>"><br>
          <label for="">Nama Pemesan : </label>
          <input type="text" name="nama" value="<?php echo $pesan['nama'] ?>" class="form-control" readonly><br>
          <label for="">Alamat : </label>
          <textarea name="alamat" rows="5" cols="80" class="form-control" readonly><?php echo $pesan['alamat'] ?></textarea><br>
          <label for="">Deskripsi : </label>
          <input class="form-control" type="text" name="deskripsi" value="<?php echo $pesan['jenis'] ?>" readonly><br>
          <input type="text" id="harga" name="" value="<?php echo $pesan['harga'] ?>" hidden>
          <label for="">Jumlah Pesanan : </label>
          <input id="jumlah" class="form-control" type="text" name="jumlah" value="" required> <?php echo "Sisa Stok tinggal $pesan[stok]"; ?> <br><br>
          <label for="">Total yang Harus dibayarkan : </label>
          <input id="total" class="form-control" type="text" name="total" value="" readonly><br>
          <input type="submit" name="pesan" value="Buat Pesanan" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>

<script src="assets/js/jquery-1.10.2.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $("#jumlah").keyup(function () {
    var harga = $("#harga").val();
    var jumlah = $("#jumlah").val();
    var total = parseInt(harga) * parseInt(jumlah);

    $("#total").val(total);


  })
})
</script>
