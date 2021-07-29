<?php
    if (isset($_POST['search'])) {
        include 'database.php';
        include 'rupiah.php';
        $no = 1;
        $search = $_POST['search'];

        $data = mysqli_query($koneksi, "SELECT * FROM beras WHERE jenis LIKE '%" . $search . "%'");
        while ($beras=mysqli_fetch_array($data)) {
            ?>
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
<?php
        }
    } ?>
