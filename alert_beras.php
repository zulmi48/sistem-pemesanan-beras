<?php if ($_GET['gagal']): ?>
  <div class="alert alert-warning" style="text-align:center">
    <strong>Mohon Maaf!</strong> <?php echo "$_GET[gagal]"; ?>
  </div>
<?php elseif ($_GET['sukses']): ?>
  <div class="alert alert-success" style="text-align:center">
    <strong>Berhasil!</strong> <?php echo "$_GET[sukses]"; ?>
  </div>
<?php elseif ($_GET['tambah']): ?>
  <div class="alert alert-success" style="text-align:center">
    <strong>Berhasil!</strong> <?php echo "$_GET[tambah]"; ?>
  </div>
<?php elseif ($_GET['edit']): ?>
  <div class="alert alert-success" style="text-align:center">
    <strong>Berhasil!</strong> <?php echo "$_GET[edit]"; ?>
  </div>
<?php elseif ($_GET['hapus']): ?>
  <div class="alert alert-danger" style="text-align:center">
    <strong>Terhapus!</strong> <?php echo "$_GET[hapus]"; ?>
  </div>
<?php endif; ?>
