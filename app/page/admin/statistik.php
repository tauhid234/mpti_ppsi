<?php 
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
if($_SESSION["status_user"]!="admin"){
    header("location:../intel/dashboard.php");
}
$unit = $_SESSION["unit"];
$year = date('Y');
$alert = "";
$cek = "";

    if(isset($_POST['cek'])){
        $cek = $_POST['opsi'];

        $jan = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '01' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataJan = mysqli_num_rows($jan);

        $feb = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '02' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataFeb = mysqli_num_rows($feb);

        $maret = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '03' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataMaret = mysqli_num_rows($maret);

        $april = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '04' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataApr = mysqli_num_rows($april);

        $mei = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '05' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataMei = mysqli_num_rows($mei);

        $juni = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '06' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataJuni = mysqli_num_rows($juni);

        $juli = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '07' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataJuli = mysqli_num_rows($juli);

        $agustus = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '08' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataAgust = mysqli_num_rows($agustus);

        $sept = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '09' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataSept = mysqli_num_rows($sept);

        $okt = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '10' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataOkt = mysqli_num_rows($okt);

        $nov = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '11' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataNov = mysqli_num_rows($nov);

        $des = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE MONTH(tanggal) = '12' AND YEAR(tanggal) = '$cek' AND polsek = '$unit' AND status_tersangka = 'tertangkap'");
        $dataDes = mysqli_num_rows($des);

        
        //REPORT
        $report_start = mysqli_query($conn,"SELECT * FROM laporan WHERE YEAR(tanggal) = '$cek' AND unit = '$unit'");
        $start = mysqli_num_rows($report_start);
        $report_proses = mysqli_query($conn,"SELECT * FROM laporan_proses WHERE YEAR(tanggal_proses) = '$cek' AND unit = '$unit'");
        $progres = mysqli_num_rows($report_proses);
        $report_end = mysqli_query($conn,"SELECT * FROM laporan_proses WHERE YEAR(tanggal_proses) = '$cek' AND unit = '$unit' AND status_laporan = 'sudah selesai'");
        $end = mysqli_num_rows($report_end);

    }else{

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
    }



?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | STATISTIK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

   
    <link rel="apple-touch-icon" href="../../../asset/logo.png">
    <link rel="shortcut icon" href="../../../asset/logo.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../asset/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../../asset/css/style.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    
    <!--SWEET ALERT-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <!-- Left Panel -->
    <?php 
    include('layout/sidebar.php');
    ?>
    <!-- /#left-panel -->
    
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <?php 
        include('layout/header.php');
        ?>
        <!-- /#header -->
        <!-- Content -->
        <?= $alert; ?>
        <div class="content">
         <!-- Animated -->
         <div class="animated fadeIn">

            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-6">
                    <h5 class="mb-4">Data Statistik</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="">
                        <select name="opsi">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                        </select>
                        <button type="submit" name="cek" class="btn btn-primary mb-4">Cek Data Statistik</button>
                        <a href="cetak/statistik.php"><button type="button" class="btn btn-dark mb-4">Cetak</button></a>
                    </form>
                    </div>
            </div>

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

        <div class="clearfix"></div>
                
               
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
       <?php 
       include('layout/footer.php');
       ?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

         <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../../asset/js/main.js"></script>

    <!--Local Stuff-->
    <script type="text/javascript">
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
                        text:'Statistik Data Kasus Narkotika Tahun <?php if($cek==""){echo date("Y");}else{echo $cek;} ?>',
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
                        text:'Statistik Data Laporan Tahun <?php if($cek==""){echo date("Y");}else{echo $cek;} ?>',
                        fontSize: 20
                    },
                    responsive : true
                }
            });


    </script>
    
</body>
</html>