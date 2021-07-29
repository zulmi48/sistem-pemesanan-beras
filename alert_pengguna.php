<?php if ($_GET['tambah']): ?>
  <div class="alert alert-success" style="text-align:center">
    <strong>Berhasil!</strong> <?php echo "$_GET[tambah]"; ?>
  </div>
<?php elseif ($_GET['del']): ?>
    <div class="alert alert-danger" style="text-align:center">
      <strong>Terhapus!</strong> <?php echo "$_GET[del]"; ?>
    </div>
<?php endif; ?>
