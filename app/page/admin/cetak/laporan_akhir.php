<?php 
session_start();
error_reporting(0);
include("../../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
$unit = $_SESSION['unit'];
$query = mysqli_query($conn,"SELECT laporan_proses.*, laporan.latitude, laporan.longtitude, laporan.keterangan, laporan.foto_lokasi, surat_tugas.tanggal, surat_tugas.tanggal_selesai, surat_tugas.an_tersangka,surat_tugas.jenis_kelamin,surat_tugas.tgl_lahir,surat_tugas.agama,surat_tugas.pendidikan_terakhir,surat_tugas.pekerjaan,surat_tugas.warganegara,surat_tugas.alamat FROM laporan_proses,surat_tugas,laporan WHERE laporan_proses.unit = '$unit' AND laporan_proses.nomer_kasus = surat_tugas.nomer_kasus AND laporan_proses.nomer_kasus = laporan.nomer_kasus AND laporan_proses.status_laporan = 'sudah selesai' AND laporan.proses_laporan = 'selesai' AND surat_tugas.status_tersangka = 'tertangkap'");
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
    
    <title>SAT RESNARKOBA | CETAK LAPORAN AKHIR</title>
  </head>
  <body onload="window.print()">
  
  <img src="../../../../asset/logo_kepolisian.jpg" class="rounded mx-auto d-block" height="100">
  <h5 class="text-center"><u></b>LAPORAN AKHIR <?= strtoupper($unit); ?></b></u></h5>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FOTO TERSANGKA</th>
      <th scope="col">NOMER KASUS</th>
      <th scope="col">NAMA TERSANGKA</th>
      <th scope="col">JENIS KELAMIN</th>
      <th scope="col">AGAMA</th>
      <th scope="col">PENDIDIKAN</th>
      <th scope="col">WARGANEGARA</th>
      <th scope="col">ALAMAT</th>
      <th scope="col">TANGGAL PENUGASAN</th>
      <th scope="col">TANGGAL PROSES</th>
      <th scope="col">TANGGAL SELESAI</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($query as $key => $value){?>
    <tr>
      <th scope="row"><?= $no++;?></th>
      <td><img src="../../../../image/<?= $value['foto_tersangka'];?>" class="rounded" height="50"></td>
      <td><?= $value['nomer_kasus'];?></td>
      <td><?= $value['an_tersangka'];?></td>
      <td><?= $value['jenis_kelamin'];?></td>
      <td><?= $value['agama'];?></td>
      <td><?= $value['pendidikan_terakhir'];?></td>
      <td><?= $value['warganegara'];?></td>
      <td><?= $value['alamat'];?></td>
      <td><?= $value['tanggal'];?></td>
      <td><?= $value['tanggal_proses'];?></td>
      <td><?= $value['tanggal_selesai'];?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>