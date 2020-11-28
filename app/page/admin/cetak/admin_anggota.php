<?php 
session_start();
error_reporting(0);
include("../../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
$unit = $_SESSION['unit'];
$query = mysqli_query($conn,"SELECT * FROM user WHERE unit = '$unit' AND status_user = 'admin'");
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
    
    <title>SAT RESNARKOBA | CETAK ADMIN ANGGOTA</title>
  </head>
  <body onload="window.print()">
  
  <img src="../../../../asset/logo_kepolisian.jpg" class="rounded mx-auto d-block" height="100">
  <h5 class="text-center"><u></b>ADMIN ANGGOTA <?= strtoupper($unit); ?></b></u></h5>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FOTO</th>
      <th scope="col">NRP</th>
      <th scope="col">NAMA</th>
      <th scope="col">JABATAN</th>
      <th scope="col">PANGKAT</th>
      <th scope="col">EMAIL</th>
      <th scope="col">NO.HP</th>
      <th scope="col">ALAMAT</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($query as $key => $value){?>
    <tr>
      <th scope="row"><?= $no++;?></th>
      <td><img src="../../../../image/<?= $value['foto'];?>" class="rounded" height="50"></td>
      <td><?= $value['nrp'];?></td>
      <td><?= $value['nama'];?></td>
      <td><?= $value['jabatan'];?></td>
      <td><?= $value['pangkat'];?></td>
      <td><?= $value['email'];?></td>
      <td><?= $value['no_hp'];?></td>
      <td><?= $value['alamat'];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>