<?php
$beras=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM beras WHERE id = '$_GET[id]'"));
 ?>

<div class="container col-md-12">
  <div class="row">
    <a href="index.php?page=beras" class="btn btn-default">Kembali <i class="fa fa-mail-reply"></i> </a><br><br>
    <div class="panel panel-default col-sm-12">
      <div class="panel-body" style="text-align:center;font-size:16px"> <b>Update Data Beras</b> </div>
    </div>
  </div><br>

  <div class="row">
    <div class="form-group col-sm-4">
      <form action="proses_beras.php" method="post" enctype="multipart/form-data">
        <input type="text" name="id" value="<?php echo $beras['id'] ?>" hidden>
        <label for="">Jenis :</label>
        <input type="text" name="jenis" class="form-control" value="<?php echo $beras['jenis'] ?>" required><br>
        <label for="">Harga :</label>
        <input type="text" name="harga" class="form-control" value="<?php echo $beras['harga'] ?>" required><br>
        <label for="">Stok :</label>
        <input type="text" name="stok" class="form-control" value="<?php echo $beras['stok'] ?>" required><br>
        <label for="">Deskripsi :</label>
        <textarea name="deskripsi" rows="4" cols="80" class="form-control" required><?php echo $beras['deskripsi'] ?></textarea><br>
        <label for="">Gambar :</label>
        <input type="file" name="pic" class="form-control" value=""><br>
        <input type="submit" name="edit_beras" value="Selesai" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
