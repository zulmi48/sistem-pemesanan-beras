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
  function bulan_indo($bulanAngka)
  {
      switch ($bulanAngka) {
      case '01':
        return 'JANUARI';
      case '02':
        return 'FEBRUARI';
      case '03':
        return 'MARET';
      case '04':
        return 'APRIL';
      case '05':
        return 'MEI';
      case '06':
        return 'JUNI';
      case '07':
        return 'JULI';
      case '08':
        return 'AGUSTUS';
      case '09':
        return 'SEPTEMBER';
      case '10':
        return 'OKTOBER';
      case '11':
        return 'NOVEMBER';
      case '12':
        return 'DESEMBER';
      break;

      default:
        return 'Bulan Tidak Valid';
        break;
    }
  }
  $query=mysqli_query($koneksi, "SELECT * FROM transaksi WHERE YEAR(tanggal) = '$tahun' AND MONTH(tanggal) = '$bulan'");
  ?>

<body>
  <center>
    <h2>LAPORAN TRANSAKSI BULAN <?php echo bulan_indo(date('m'));  ?></h2>
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>
            <center>No.
          </th>
          <th>
            <center>Kode Transaksi
          </th>
          <th style="width:100px">
            <center>Tanggal
          </th>
          <th>
            <center>Kode Pesanan
          </th>
          <th>
            <center>Total
          </th>
          <th>
            <center>Ongkos Kirim
          </th>
          <th>
            <center>Total Pemasukan
          </th>
        </tr>
      </thead>
      <tbody>
        <?php while ($transaksi=mysqli_fetch_array($query)) { ?>
        <tr>
          <td><?php echo $no++ ?></td>
          <td><?php echo $transaksi['kode_trans'] ?></td>
          <td><?php echo $transaksi['tanggal'] ?></td>
          <td><?php echo $transaksi['kode_psn'] ?></td>
          <td><?php echo rupiah($transaksi['total']) ?></td>
          <td><?php echo rupiah($transaksi['ongkir']) ?></td>
          <td><?php echo rupiah($transaksi['total_pemasukan']) ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
<script type="text/javascript">
  window.print();
</script>
</body>

</html>
