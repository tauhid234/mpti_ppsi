<?php 
session_start();
error_reporting(0);
include("../../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
$unit = $_SESSION['unit'];
$query = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE polsek = '$unit' AND status_tersangka = 'belum tertangkap' ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>SAT RESNARKOBA | CETAK PENUGASAN</title>
  </head>
  <body onload="window.print()">
  
  <img src="../../../../asset/logo_kepolisian.jpg" class="rounded mx-auto d-block" width="100" height="100">
  <h5 class="text-center"><u></b>SURAT PERINTAH TUGAS</b></u></h5>
  <p class="card-title text-center">Nomor : SP. Gas / 11 - BRTS / I / 2020 / BNNP</p>

  <p class="m-4">Pertimbangan : Bahwa untuk kepentingan penyelidikan dan penyidikan Tindak Pidana
                                Peredaran Gelap Narkotika Golongan I, serta untuk melakukan tindakan
                                hukum, maka perlu mengeluarkan surat perintah tugas ini.</p>

  <p class="m-4">Dasar :</p>
  <p style="margin-left:70px;">1. Pasal 5 ayat (2), Pasal 6, Pasal 7 ayat (1) huruf d, pasal 11, Pasal 18
                                  ayat (1) dan Pasal 19 ayat (2) KUHAP;
                           <br>2. Pasal 70, Pasal 71, Pasal 72, Pasal 73, Pasal 75, dan Pasal 80 UndangUndang Republik Indonesia Nomor 35 tahun 2009 tentang Narkotika;
                           <br>3. Peraturan Presiden Republik Indonesia Nomor 23 tahun 2010,tentang Badan Narkotika Nasional;
                           <br>4. Undang-Undang Republik Indonesia Nomor 35 tahun 2009 tentang Narkotika;
                           <br>5. Laporan Kasus Narkotika Nomor : <?= $data['nomer_kasus'];?> / 11-BRTS / I / 2016 / BNNP</p>


  <p class="text-center"><b><u>DIPERINTAHKAN</u></b></p>

  <p class="m-4">Kepada Team : </p>

  <p class="text-center"><?= $data['nama_team'];?></p>

  <p class="m-4">Untuk : </p>
  <p style="margin-left:70px;">1. Melaksanakan tugas penyelidikan, penangkapan, penggeledahan dan
                                  penyitaan Perkara Tindak Pidana Peredaran Gelap Narkotika yang
                                  dilakukan oleh Tersangka An <?= $data['an_tersangka'];?>
                           <br>2. Surat Perintah ini berlaku mulai tanggal <?= $data['tanggal'];?> – selesai.
                           <br>3. Melaksanakan perintah ini dengan penuh rasa tanggung jawab dan
                                  melaporkan hasilnya.</p>

  <p class="m-4">Selesai : -</p>

  <p class="m-4 text-right">Dikeluarkan di : <?= $data['polsek']; ?></p>
  <p class="m-4 text-right">Pada tanggal : <?= $data['tanggal'];?></p>

  <p class="m-4 text-right p-4"><?= $data['polsek']; ?></p>
  <p class="m-4 mt-4 text-right p-4">(..................................................)</p>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>