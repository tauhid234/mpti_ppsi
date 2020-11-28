<?php 
session_start();
error_reporting(0);
include("../../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
$unit = $_SESSION['unit'];
$query = mysqli_query($conn,"SELECT * FROM tersangka WHERE status_tersangka = 'tertangkap' AND unit = '$unit'");
$no = 1;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    
    <title>SAT RESNARKOBA | CETAK DATA TERSANGKA</title>
  </head>
  <body onload="window.print()">
  
  <img src="../../../../asset/logo_kepolisian.jpg" class="rounded mx-auto d-block" height="100">
  <h5 class="text-center"><u></b>DATA TERSANGKA <?= strtoupper($unit); ?></b></u></h5>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FOTO</th>
      <th scope="col">KODE TERSANGKA</th>
      <th scope="col">KODE LAPORAN</th>
      <th scope="col">NAMA TERSANGKA</th>
      <th scope="col">UMUR</th>
      <th scope="col">PEKERJAAN</th>
      <th scope="col">WARGANEGARA</th>
      <th scope="col">ALAMAT</th>
      <th scope="col">PASAL</th>
      <th scope="col">BARANG BUKTI</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($query as $key => $value){?>
    <tr>
      <th scope="row"><?= $no++;?></th>
      <td><img src="../../../../image/<?= $value['foto'];?>" class="rounded" height="50"></td>
      <td><?= $value['kd_tersangka'];?></td>
      <td><?= $value['kd_laporan'];?></td>
      <td><?= $value['nama'];?></td>
      <td><?= $value['umur'];?></td>
      <td><?= $value['pekerjaan'];?></td>
      <td><?= $value['warganegara'];?></td>
      <td><?= $value['alamat'];?></td>
      <td><?= $value['pasal'];?></td>
      <td><?= $value['barang_bukti'];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>