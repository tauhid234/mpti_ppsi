<?php 
session_start();
error_reporting(0);
include("../../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
$unit = $_SESSION['unit'];
$query = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE polsek = '$unit' AND status_tersangka = 'belum tertangkap'");
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
    
    <title>SAT RESNARKOBA | CETAK DATA DPO</title>
  </head>
  <body onload="window.print()">
  
  <img src="../../../../asset/logo_kepolisian.jpg" class="rounded mx-auto d-block" height="100">
  <h5 class="text-center"><u></b>DATA DPO <?= strtoupper($unit); ?></b></u></h5>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FOTO DPO</th>
      <th scope="col">Nama DPO</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Alamat</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($query as $key => $value){?>
    <tr>
      <th scope="row"><?= $no++;?></th>
      <td><img src="../../../../image/<?= $value['foto'];?>" class="rounded" height="50"></td>
      <td><?= $value['an_tersangka']; ?></td>
      <td><?= $value['tanggal']; ?></td>
      <td><?= $value['jenis_kelamin']; ?></td>
      <td><?= $value['tgl_lahir']; ?></td>
      <td><?= $value['alamat']; ?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>