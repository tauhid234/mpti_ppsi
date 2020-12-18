<?php 
session_start();
error_reporting(0);
include("../../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
$unit = $_SESSION['unit'];
$query = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE polsek = '$unit' AND status_tersangka = 'tertangkap' ORDER BY id DESC LIMIT 1");
$data = mysqli_fetch_array($query);
$tanggal = date('d');
$bulan = date('m');
$tahun = date('Y');

$timezone = date_default_timezone_set("asia/Jakarta");
$waktu = date("H:i:s");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>SAT RESNARKOBA | CETAK BERITA ACARA PENGKAPAN</title>
  </head>
  <body onload="window.print()">
  
  <img src="../../../../asset/logo_kepolisian.jpg" class="rounded mx-auto d-block" height="100">
  <h5 class="text-center"><u></b>BERITA ACARA PENANGKAPAN</b></u></h5>

  <p class="m-4">Pada Hari ini tanggal <?= $tanggal; ?> Bulan <?= $bulan; ?> Tahun <?= $tahun; ?> waktu <?= $waktu; ?></p>


  <p class="text-center"><b><u>DIPERINTAHKAN</u></b></p>

  <p class="m-4">Kepada Team : </p>

  <p class="text-center"><?= $data['nama_team'];?></p>

  <p class="m-4">Masing - masing berkantor dari yang sama, berdasarkan : </p>
  <p style="margin-left:70px;">1. Laporan Kasus Narkotika Nomor : LKN / 11-BRTS / I / 2016 / BNNP, tanggal <?= date("Y-m-d"); ?>
                           <br>2. Surat Perintah Penangkapan Nomor : SP. Kap / 112-BRTS / I / 2016 / BNNP tanggal <?= date("Y-m-d"); ?>
                           <br>3. Surat Perintah Perpanjangan Penangkapan Nomor : SP. Jang Kap / 112a-BRTS / I / 2020 / BNNP tanggal <?= date("Y-m-d"); ?></p>

  <p class="m-4">Telah melakukan penangkapan terhadap seorang tersangka :</p>
  <p style="margin-left:70px;"><br>Nama : <?= $data["an_tersangka"]; ?>
                                <br>Jenis Kelamin : <?= $data["jenis_kelamin"]; ?>
                                <br>Tempat Tgl Lahir : <?= $data["tgl_lahir"]; ?>
                                <br>Agama : <?= $data["agama"]; ?>
                                <br>Pendidikan Terakhir : <?= $data["pendidikan_terakhir"]; ?>
                                <br>Pekerjaan : <?= $data["pekerjaan"]; ?>
                                <br>Kewarganegaraan : <?= $data["warganegara"]; ?>
                                <br>Alamat : <?= $data["alamat"]; ?>
                                </p>

  <p class="m-4">Yang bersangkutan ditangkap karena diduga telah melakukan Tindak Pidana Peredaran Gelap Narkotika. 
  sebagaimana dimaksud dalam ... Undang-Undang Republik Indonesia Nomor 35 tahun 2009 tentang Narkotika.</p>

  <p class="m-4">Demikianlah Berita Acara Penangkapan ini dibuat dengan sebenar-benarnya, atas kekuatan sumpah
  jabatan, kemudian ditutup dan ditandatangani di <?= $unit; ?>, pada tanggal dan bulan serta tahun tersebut diatas</p>

  <div class="text-right m-4">

        Tersangka &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
        <?= $data["polsek"]; ?>
        <br><br><br>
        <p>( <?= $data["an_tersangka"]; ?> )&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;(..................................................)</p>
  </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>