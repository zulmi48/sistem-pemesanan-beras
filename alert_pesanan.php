<?php if ($_GET['lunas']): ?>
  <div class="alert alert-success" style="text-align:center">
    <strong>Berhasil!</strong> <?php echo "$_GET[lunas]"; ?>
  </div>
<?php elseif ($_GET['kirim']): ?>
    <div class="alert alert-success" style="text-align:center">
      <strong>Berhasil!</strong> <?php echo "$_GET[kirim]"; ?>
    </div>
<?php elseif ($_GET['batal']): ?>
    <div class="alert alert-danger" style="text-align:center">
      <strong>Berhasil!</strong> <?php echo "$_GET[batal]"; ?>
    </div>
<?php elseif ($_GET['konfirmasi']): ?>
    <div class="alert alert-success" style="text-align:center">
      <strong>Berhasil!</strong> <?php echo "$_GET[konfirmasi]"; ?>
    </div>
<?php elseif ($_GET['kirimkan']): ?>
    <div class="alert alert-success" style="text-align:center">
      <strong>Berhasil!</strong> <?php echo "$_GET[kirimkan]"; ?>
    </div>
<?php endif; ?>
