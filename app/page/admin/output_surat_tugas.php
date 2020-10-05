<?php 
session_start();
require('../../../fpdf/fpdf.php');
require('../../../server/config.php');

$polsek = $_SESSION["unit"];
if(isset($_POST["export"])){
    $kasus = $_POST["laporan_kasus_narkotika_nomor"];
    $nama = implode(',',$_POST["nama"]);
    $pangkat = implode(',',$_POST["pangkat"]);
    $nrp = implode(',',$_POST["penugasan"]);
    $tgl = date("Y-m-d");

$http = mysqli_query($conn,"INSERT INTO surat_tugas (id,nomer_kasus,nama,nrp,pangkat,jabatan,tanggal,polsek) VALUES ('','$kasus','$nama','$nrp','$pangkat','$pangkat','$tgl','$polsek')");
}
$query = mysqli_query($conn,"SELECT * FROM surat_tugas");
$date = getdate(date("U"));

$pdf = new FPDF('P','mm','Legal');
$pdf->AddPage();
$pdf->SetFont('Arial','BU',20);
$pdf->Cell(60);
$pdf->Cell(80,10,'Surat Perintah Tugas');

$pdf->SetFont('Arial','',13);
$pdf->Cell(-90);
$pdf->Cell(10,30,'Nomor : SP. Gas / 11 - BRTS / I / ' .$date['year']. ' / BNNP');

$pdf->SetFont('Arial','',11);
$pdf->Cell(-50);
$pdf->Cell(10,50,'Pertimbangan');
$pdf->Cell(30);
$pdf->Cell(10,50,':');

$pdf->Cell(1);
$pdf->Cell(10,50,'Bahwa untuk kepentingan penyelidikan dan penyidikan Tindak Pidana');


$pdf->Cell(-10);
$pdf->Cell(10,60,'Peredaran Gelap Narkotika Golongan I, serta untuk melakukan tindakan');


$pdf->Cell(-10);
$pdf->Cell(10,70,'hukum, maka perlu mengeluarkan surat perintah tugas ini.');

$pdf->Cell(-61);
$pdf->Cell(10,90,'Dasar');
$pdf->Cell(30);
$pdf->Cell(10,90,':');


$pdf->Cell(1);
$pdf->Cell(10,90,'1.  Pasal 5 ayat (2), Pasal 6, Pasal 7 ayat (1) huruf d, pasal 11, Pasal 18');


$pdf->Cell(-5);
$pdf->Cell(10,100,' ayat (1) dan Pasal 19 ayat (2) KUHAP;');


$pdf->Cell(-15);
$pdf->Cell(10,110,'2.  Pasal 70, Pasal 71, Pasal 72, Pasal 73, Pasal 75, dan Pasal 80 Undang -');


$pdf->Cell(-5);
$pdf->Cell(10,120,' Undang Republik Indonesia Nomor 35 tahun 2009 tentang Narkotika;');


$pdf->Cell(-15);
$pdf->Cell(10,130,'3.  Peraturan Presiden Republik Indonesia Nomor 23 tahun 2010,');


$pdf->Cell(-5);
$pdf->Cell(10,140,' tentang Badan Narkotika Nasional;');


$pdf->Cell(-15);
$pdf->Cell(10,150,'4.  Undang-Undang Republik Indonesia Nomor 35 tahun 2009 tentang');


$pdf->Cell(-5);
$pdf->Cell(10,160,' Narkotika;');


$pdf->Cell(-15);
$pdf->Cell(10,170,'5.  Laporan Kasus Narkotika Nomor : LKN / 11-BRTS / I / 2016 / ');


$pdf->Cell(-5);
$pdf->Cell(10,180,' BNNP, .................................................................................................;');

$pdf->SetFont('Arial','BU',12);
$pdf->Cell(-5);
$pdf->Cell(10,200,'DIPERINTAHKAN');

$pdf->SetFont('Arial','','11');
$pdf->Cell(-71);
$pdf->Cell(10,230,'Kepada');
$pdf->Cell(30);
$pdf->Cell(10,230,':');

$width_cell=array(20,50,40,40,40);
$pdf->SetFont('Arial','B',11);

// $pdf->Cell(-50,270);
$left = 25;
$pdf->Cell(10,130,'',0,1);
$pdf->SetX(25);
$pdf->Cell(20,6,'NO',1,0);
$pdf->Cell(45,6,'NAMA',1,0);
$pdf->Cell(30,6,'PANGKAT',1,0);
$pdf->Cell(35,6,'NRP',1,0);
$pdf->Cell(30,6,'JABATAN',1,1);

$no = 0;
while ($row = mysqli_fetch_array($query)){
    $result = explode(',',$row['nama']);
    $string = $result.strpos(",","r");
    // $result = explode(',',$row['pangkat']);
    // $result = explode(',',$row['nrp']);
    // $result = explode(',',$row['jabatan']);
    // foreach($result as $s){
    $no++;
    $pdf->SetX($left);
    $pdf->Cell(20,6,$no,1,0);
    $pdf->Cell(45,6,'',1,0);
    $pdf->Cell(30,6,$row['pangkat'],1,0);
    $pdf->Cell(35,6,$row['nrp'],1,0);
    $pdf->Cell(30,6,$row['jabatan'],1,1);
    // }
}

$pdf->SetFont('Arial','',11);
$pdf->Cell(11);
$pdf->Cell(10,40,'Untuk');


$pdf->Cell(30);
$pdf->Cell(10,40,':');


$pdf->Cell(1);
$pdf->Cell(10,40,'1.  Melaksanakan tugas penyelidikan, penangkapan, penggeledahan dan');


$pdf->Cell(-5);
$pdf->Cell(10,50,'penyitaan Perkara Tindak Pidana Peredaran Gelap Narkotika yang');


$pdf->Cell(-10);
$pdf->Cell(10,60,'dilakukan oleh Tersangka An. .................................................................');

$pdf->Cell(-15);
$pdf->Cell(10,70,'2.  Surat Perintah ini berlaku mulai tanggal ' .$date['mday'].' ' .$date['month']. ' ' .$date['year'].' - selesai.');


$pdf->Cell(-10);
$pdf->Cell(10,80,'3.  Melaksanakan tugas penyelidikan, penangkapan, penggeledahan dan');


$pdf->Cell(-5);
$pdf->Cell(10,90,'melaporkan hasilnya.');


$pdf->Cell(40);
$pdf->Cell(10,100,'Dikeluarkan di       :   ...........');

$pdf->Cell(-10);
$pdf->Cell(10,115,'Pada Tanggal       :   ...........');


$pdf->Cell(-100);
$pdf->Cell(10,130,'Yang Menerima Perintah');

$pdf->Cell(5);
$pdf->Cell(15,140,'Penyidik');


$pdf->Cell(-25);
$pdf->Cell(15,160,'................................');


$pdf->Cell(70);
$pdf->Cell(10,130,'POLSEK .....');


$pdf->Cell(-10);
$pdf->Cell(15,140,'Selaku Penyidik');


$pdf->Cell(-15);
$pdf->Cell(15,160,'................................');
$pdf->output();