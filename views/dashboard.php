<?php
$tahun_ini = date('Y');
$data=mysqli_query($koneksi, "SELECT * FROM transaksi WHERE YEAR(tanggal) = '$tahun_ini' ORDER BY MONTH(tanggal) ASC");
while ($trans=mysqli_fetch_array($data)) {
    $bulan[] = date('F', strtotime($trans['tanggal']));
    $month = date('m', strtotime($trans['tanggal']));

    $nilai=mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(total_pemasukan) as total FROM transaksi WHERE MONTH(tanggal) = '$month' "));
    $total_bulanan [] = $nilai['total'] ;
}
 ?>

<div class="container col-md-12">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body" style="text-align:center;font-size:16px"> <b>Dashboard</b> </div>
    </div>
  </div>

  <div class="row">
    <canvas id="myChart" width="400" height="150"></canvas>
  </div>
</div>

<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: "line",
    data: {
      labels : <?php echo json_encode($bulan); ?>,
      datasets: [{
        label : "Pemasukan UD. Ndaru Sri Jaya Pada Tahun <?php echo $tahun_ini ?>",
        data: <?php echo json_encode($total_bulanan); ?>,
        fill: false,
        borderColor: "rgb(75, 192, 192)",
        lineTension: 0.1
      }]
    },
    options: {}
  });
</script>
