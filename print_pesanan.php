<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>

  <?php
  include 'database.php'; include 'rupiah.php';
  $tahun=date('Y'); $bulan=date('m'); $no=1;
  $query=mysqli_query($koneksi, "SELECT * FROM pesanan WHERE YEAR(tanggal) = '$tahun' AND MONTH(tanggal) = '$bulan'");
  ?>

<body>
  <center>
    <h2>LAPORAN PESANAN BULAN FEBRUARI</h2>
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>
            <center>No.
          </th>
          <th>
            <center>Pemesan
          </th>
          <th>
            <center>Alamat
          </th>
          <th style="width:100px">
            <center>Tanggal
          </th>
          <th>
            <center>Kode Pesanan
          </th>
          <th>
            <center>Deskripsi
          </th>
          <th>
            <center>Jumlah
          </th>
          <th>
            <center>Total Pembayaran
          </th>
        </tr>
      </thead>
      <tbody>
        <?php while ($pesanan=mysqli_fetch_array($query)) { ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $pesanan['nama'] ?></td>
          <td><?php echo $pesanan['alamat'] ?></td>
          <td><?php echo $pesanan['tanggal'] ?></td>
          <td><?php echo $pesanan['kode_psn'] ?></td>
          <td><?php echo $pesanan['deskripsi'] ?></td>
          <td><?php echo $pesanan['jumlah'] ?></td>
          <td><?php echo rupiah($pesanan['total']) ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>

    <script type="text/javascript">
      window.print();
    </script>
</body>

</html>
