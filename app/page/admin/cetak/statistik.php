<?php 
session_start();
include("../../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
if($_SESSION["status_user"]!="admin"){
    header("location:../intel/dashboard.php");
}
$unit = $_SESSION["unit"];
$year = date('Y');
$alert = "";

        $jan = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '01' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataJan = mysqli_num_rows($jan);

        $feb = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '02' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataFeb = mysqli_num_rows($feb);

        $maret = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '03' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataMaret = mysqli_num_rows($maret);

        $april = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '04' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataApr = mysqli_num_rows($april);

        $mei = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '05' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataMei = mysqli_num_rows($mei);

        $juni = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '06' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataJuni = mysqli_num_rows($juni);

        $juli = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '07' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataJuli = mysqli_num_rows($juli);

        $agustus = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '08' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataAgust = mysqli_num_rows($agustus);

        $sept = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '09' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataSept = mysqli_num_rows($sept);

        $okt = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '10' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataOkt = mysqli_num_rows($okt);

        $nov = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '11' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataNov = mysqli_num_rows($nov);

        $des = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '12' AND YEAR(tanggal) = '$year' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataDes = mysqli_num_rows($des);
        
        //REPORT
        $report_start = mysqli_query($conn,"SELECT * FROM laporan WHERE YEAR(tanggal) = '$year' AND unit = '$unit'");
        $start = mysqli_num_rows($report_start);
        $report_proses = mysqli_query($conn,"SELECT * FROM laporan_proses WHERE YEAR(tanggal_proses) = '$year' AND unit = '$unit'");
        $progres = mysqli_num_rows($report_proses);
        $report_end = mysqli_query($conn,"SELECT * FROM laporan_proses WHERE YEAR(tanggal_proses) = '$year' AND unit = '$unit' AND status_laporan = 'sudah selesai'");
        $end = mysqli_num_rows($report_end);



?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | CETAK STATISTIK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link rel="apple-touch-icon" href="../../../asset/logo.png">
    <link rel="shortcut icon" href="../../../asset/logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    

</head>

<body>

  <img src="../../../../asset/logo_kepolisian.jpg" class="rounded mx-auto d-block" height="100">
  <h5 class="text-center"><u></b>LAPORAN DATA STATISTIK <?= strtoupper($unit); ?></b></u></h5>
            <button type="button" class="btn btn-primary" onclick="onPrint()">Print Statistik</button>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <canvas id="laporan"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

      
    <!--Local Stuff-->
    <script type="text/javascript">
    function onPrint(){
        window.print();
    }
        var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan','Feb','Maret','Apr','Mei','Juni','Juli','Agust','Sept','Okt','Nov','Des'],
                    datasets: [{
                            label: 'Total Kasus',
                            data: [<?= $dataJan; ?>,
                                   <?= $dataFeb; ?>,
                                   <?= $dataMaret; ?>,
                                   <?= $dataApr; ?>,
                                   <?= $dataMei; ?>,
                                   <?= $dataJuni; ?>,
                                   <?= $dataJuli; ?>,
                                   <?= $dataAgust; ?>,
                                   <?= $dataSept; ?>,
                                   <?= $dataOkt; ?>,
                                   <?= $dataNov; ?>,
                                   <?= $dataDes; ?>],
                            
                            backgroundColor: "#2980b9",
                            
                            borderColor: "#2980b9",
                            
                            borderWidth: 1
                        }]
                },
                options: {
                    title: {
                        display: true,
                        text:'Statistik Data Kasus Narkotika Tahun <?= date("Y"); ?>',
                        fontSize: 20
                    },
                    responsive : true
                }
            });





            var datalaporan = document.getElementById("laporan");
            var myreport = new Chart(datalaporan, {
                type: 'bar',
                data: {
                    labels: ['laporan Awal','Laporan Proses','Laporan Akhir'],
                    datasets: [{
                            label: 'Total Laporan',
                            data: [<?= $start; ?>,
                                   <?= $progres; ?>,
                                   <?= $end; ?>],
                            
                            backgroundColor: ["#b2bec3",
                                              "#74b9ff",
                                              "#55efc4"],
                            
                            borderColor: ["#b2bec3",
                                          "#74b9ff",
                                          "#55efc4"],
                            
                            borderWidth: 1
                        }]
                },
                options: {
                    title: {
                        display: true,
                        text:'Statistik Data Laporan Tahun <?= date("Y"); ?>',
                        fontSize: 20
                    },
                    responsive : true
                }
            });


    </script>
    
</body>
</html>