<?php 
session_start();
require('../../../fpdf/fpdf.php');
require('../../../server/config.php');

$polsek = $_SESSION["unit"];
if(isset($_POST["export"])){
    $kasus = $_POST["laporan_kasus_narkotika_nomor"];
    $nama = implode(',',$_POST["nama"]);
    $tgl = date("Y-m-d");
    $tersangka = $_POST["an_tersangka"];

$http = mysqli_query($conn,"INSERT INTO surat_tugas (id,nomer_kasus,nama,tanggal,polsek,an_tersangka,status_tersangka) VALUES 
                    ('','$kasus','$nama','$tgl','$polsek','$tersangka','belum tertangkap')");
}
$query = mysqli_query($conn,"SELECT * FROM surat_tugas");
$data = mysqli_fetch_array($query);
$date = getdate(date("U"));

$pdf = new FPDF('P','mm','Legal');
$pdf->AddPage();
$pdf->SetFont('Arial','BU',20);
$pdf->Cell(40);
$pdf->Cell(80,10,'SURAT PERINTAH PENANGKAPAN');

$pdf->Cell(20);
$pdf->SetFont('Arial','',13);
$pdf->Cell(-90);
$pdf->Cell(10,30,'Nomor : SP. Kap / 112 -BRTS / I / ' .$date['year']. ' / BNNP');

$pdf->SetFont('Arial','',11);
$pdf->Cell(-50);
$pdf->Cell(10,50,'Pertimbangan');
$pdf->Cell(30);
$pdf->Cell(10,50,':');

$pdf->Cell(1);
$pdf->Cell(10,50,'Bahwa untuk kepentingan penyidikan terhadap suatu perbuatan yang diduga');


$pdf->Cell(-10);
$pdf->Cell(10,60,'merupakan Tindak Pidana Peredaran Gelap Narkotika Golongan 1, maka');


$pdf->Cell(-10);
$pdf->Cell(10,70,'perlu mengeluarkan Surat Perintah Penangkapan ini.');

$pdf->Cell(-61);
$pdf->Cell(10,90,'Dasar');
$pdf->Cell(30);
$pdf->Cell(10,90,':');


$pdf->Cell(1);
$pdf->Cell(10,90,'6. Pasal 5 ayat (1) huruf b angka 1, Pasal 7 ayat (1) huruf d, Pasal 11, Pasal');


$pdf->Cell(-5);
$pdf->Cell(10,100,'16, Pasal 17, Pasal 18, Pasal 19, Pasal 75, Pasal 111 KUHAP;');


$pdf->Cell(-15);
$pdf->Cell(10,110,'7. Pasal 70, Pasal 71, Pasal 72, Pasal 73, Pasal 75 huruf g, Pasal 80 huruf h');


$pdf->Cell(-5);
$pdf->Cell(10,120,'dan Pasal 88 Undang-Undang Republik Indonesia Nomor 35 tahun 2009');


$pdf->Cell(-10);
$pdf->Cell(10,130,'tentang Narkotika;');


$pdf->Cell(-15);
$pdf->Cell(10,140,'8. Peraturan Presiden Republik Indonesia Nomor 23 tahun 2010, tentang');


$pdf->Cell(-5);
$pdf->Cell(10,150,'Badan Narkotika Nasional;');


$pdf->Cell(-15);
$pdf->Cell(10,160,'9. Undang-Undang Republik Indonesia Nomor 35 tahun 2009 tentang');


$pdf->Cell(-5);
$pdf->Cell(10,170,'Narkotika;');


$pdf->Cell(-15);
$pdf->Cell(10,180,'10.  Laporan Kasus Narkotika Nomor : LKN / 11-BRTS / I / 2016 / BNNP,  ');


$pdf->Cell(-5);
$pdf->Cell(10,190,' tanggal .......................................................................................................');

$pdf->SetFont('Arial','BU',12);
$pdf->Cell(-5);
$pdf->Cell(10,220,'DIPERINTAHKAN');

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
$pdf->Cell(140,6,'NAMA ANGGOTA',1,1);

$no = 0;
// while ($row = mysqli_fetch_array($query)){
    $result = explode(',',$data['nama']);
    foreach ($result as $key) {
    $no++;
    $pdf->SetX($left);
    $pdf->Cell(20,6,$no,1,0);
    $pdf->Cell(140,6,$key,1,1);
    }
// }

$pdf->SetFont('Arial','',11);
$pdf->Cell(11);
$pdf->Cell(10,40,'Untuk');


$pdf->Cell(30);
$pdf->Cell(10,40,':');


$pdf->Cell(1);
$pdf->Cell(10,40,'1.  Melakukan penangkapan terhadap tersangka :');


$pdf->Cell(-5);
$pdf->Cell(10,50,'Nama                              : ');


$pdf->Cell(-10);
$pdf->Cell(10,60,'Jenis Kelamin                  : ');


$pdf->Cell(-10);
$pdf->Cell(10,70,'Tempat, Tanggal Lahir     : ');


$pdf->Cell(-10);
$pdf->Cell(10,80,'Agama                             : ');


$pdf->Cell(-10);
$pdf->Cell(10,90,'Pendidikan Terakhir         : ');


$pdf->Cell(-10);
$pdf->Cell(10,100,'Pekerjaan                         : ');


$pdf->Cell(-10);
$pdf->Cell(10,110,'Kewarganegaraan            : ');


$pdf->Cell(-10);
$pdf->Cell(10,120,'Alamat                               : ');


$pdf->Cell(-10);
$pdf->Cell(10,130,'Tindak Pidana Peredaran Gelap Narkotika .............................................');


$pdf->Cell(-10);
$pdf->Cell(10,140,'sebagaimana dimaksud dalam ....................................................................');


$pdf->Cell(-10);
$pdf->Cell(10,150,'Undang-Undang Republik Indonesia Nomor 35 tahun 2009 tentang');


$pdf->Cell(-10);
$pdf->Cell(10,160,'Narkotika.');


$pdf->Cell(-10);
$pdf->Cell(10,170,'2. Melakukan penggeledahan badan/pakaian tersangka.');


$pdf->Cell(-10);
$pdf->Cell(10,180,'3. Surat Perintah ini berlaku dari tanggal 08 Januari 2016 s/d 10 Januari');


// $pdf->Cell(-10);
$pdf->Cell(10,180,'');
$pdf->Cell(10,185,$date['year']);


$pdf->Cell(-10);
$pdf->Cell(10,195,'4. Setelah melakukan perintah ini agar membuat Berita Acara');


$pdf->Cell(-10);
$pdf->Cell(10,210,'Penangkapan.');


// $pdf->Cell(-5);
// $pdf->Cell(10,90,'melaporkan hasilnya.');


// $pdf->Cell(40);
// $pdf->Cell(10,100,'Dikeluarkan di       :   '.$data['polsek']);

// $pdf->Cell(-10);
// $pdf->Cell(10,115,'Pada Tanggal       :   '.$data['tanggal']);


// $pdf->Cell(-100);
// $pdf->Cell(10,130,'Yang Menerima Perintah');

// $pdf->Cell(5);
// $pdf->Cell(15,140,'Penyidik');


// $pdf->Cell(-25);
// $pdf->Cell(15,160,'................................');


// $pdf->Cell(70);
// $pdf->Cell(10,130,$data['polsek']);


// $pdf->Cell(-15);
// $pdf->Cell(15,160,'................................');
$pdf->output();