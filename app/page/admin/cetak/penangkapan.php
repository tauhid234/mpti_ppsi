<?php 
session_start();
error_reporting(0);
include("../../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
$unit = $_SESSION['unit'];
if(isset($_GET["_hash"]))
$id = base64_decode($_GET['_hash']);
$query = mysqli_query($conn,"SELECT laporan.*, surat_tugas.* FROM laporan,surat_tugas WHERE laporan.unit = '$unit' AND laporan.proses_laporan = 'proses' AND laporan.nomer_kasus = surat_tugas.nomer_kasus AND laporan.id = '$id'");
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

    <title>SAT RESNARKOBA | CETAK PROSES PENANGKAPAN</title>
  </head>
  <body onload="window.print()">
  
  <h5 class="text-center"><u></b>SURAT PERINTAH PENANGKAPAN</b></u></h5>
  <p class="card-title text-center">Nomor :  SP. Kap / 112 -BRTS / I / 2020 / BNNP</p>

  <p class="m-4">Pertimbangan : Bahwa untuk kepentingan penyidikan terhadap suatu perbuatan yang diduga
                                merupakan Tindak Pidana Peredaran Gelap Narkotika Golongan 1, maka
                                perlu mengeluarkan Surat Perintah Penangkapan ini.</p>

  <p class="m-4">Dasar :</p>
  <p style="margin-left:70px;">6. Pasal 5 ayat (1) huruf b angka 1, Pasal 7 ayat (1) huruf d, Pasal 11, Pasal 16,
                                  Pasal 17, Pasal 18, Pasal 19, Pasal 75, Pasal 111 KUHAP;
                           <br>7. Pasal 70, Pasal 71, Pasal 72, Pasal 73, Pasal 75 huruf g, Pasal 80 huruf h 
                                  dan Pasal 88 Undang-Undang Republik Indonesia Nomor 35 tahun 2009 tentang Narkotika;
                           <br>8. Peraturan Presiden Republik Indonesia Nomor 23 tahun 2010, tentang Badan Narkotika Nasional;
                           <br>9. Undang-Undang Republik Indonesia Nomor 35 tahun 2009 tentang Narkotika;
                           <br>10. Laporan Kasus Narkotika Nomor : LKN / 11-BRTS / I / 2016 / BNNP, tanggal </p>


  <p class="text-center"><b><u>DIPERINTAHKAN</u></b></p>

  <p class="m-4">Kepada Team : </p>

  <p class="text-center"><?= $data['nama_team'];?></p>

  <p class="m-4">Untuk : </p>
  <p style="margin-left:70px;">1. Melakukan penangkapan terhadap tersangka :
                              <br> Nama : <?= $data['an_tersangka'];?>
                              <br> Jenis Kelamin : <?= $data['jenis_kelamin'];?>
                              <br> Tempat, Tanggal Lahir : <?= $data['tgl_lahir'];?>
                              <br> Agama : <?= $data['agama'];?>
                              <br> Pendidikan Terakhir : <?= $data['pendidikan_terakhir'];?>
                              <br> Pekerjaan : <?= $data['pekerjaan'];?>
                              <br> Kewarganegaraan : <?= $data['warganegara'];?>
                              <br> Alamat : <?= $data['alamat'];?>
                              <br> Tindak Pidana Peredaran Gelap Narkotika ..................
                              <br> sebagaimana dimaksud dalam .......................
                              <br> Undang-Undang Republik Indonesia Nomor 35 tahun 2009 tentang Narkotika.
                        <br>  2. Melakukan penggeledahan badan/pakaian tersangka.                                       
                                                                                                                    <!-- M     J    H    -->
                        <br>  3. Surat Perintah ini berlaku dari tanggal <?= date('Y-m-d'); ?> s/d <?= date('Y-m-d', time() + (60 * 60 * 24 * 3)) ?>.
                        <br>  4. Setelah melakukan perintah ini agar membuat Berita Acara Penangkapan.</p>
                           
  <p class="m-4">Selesai : -</p>

  <p class="m-4 text-right">Dikeluarkan di : <?= $data['polsek']; ?></p>
  <p class="m-4 text-right">Pada tanggal : <?= $data['tanggal'];?></p>

  <p class="m-4 text-right p-4"><?= $data['polsek']; ?></p>
  <p class="m-4 mt-4 text-right p-4">(..................................................)</p>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>