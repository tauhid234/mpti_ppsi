<?php
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("location:../../authentication/index.php");
}
$unit = $_SESSION['unit'];
$team = $_SESSION["nama_team"];
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | DASHBOARD</title>
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

    
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

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
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                
                <?php 
                $map = mysqli_query($conn,"SELECT alamat FROM surat_tugas WHERE polsek = '$unit' AND nama_team = '$team'");
                $data = mysqli_fetch_array($map);

                $queryCek = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE polsek = '$unit' AND nama_team = '$team'");
                $cekrow = mysqli_num_rows($queryCek);
                if($cekrow==1){
                ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <strong class="card-title">Anda memiliki tugas penangkapan </strong><img src="../../../asset/gif/red-sirene.gif" style="height:30px;">
                            </div>
                           
                        </div>
                    </div>
                </div>
                </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                <strong class="card-title mb-2">Lokasi DPO </strong>
                                <iframe
                                    width="100%"
                                    height="450"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBYHSJymZYnSTdi3vH4Mh_H7b-jAgBOCag
                                        &q=<?= str_replace('','+',$data['alamat']);?>" allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                    </div>

              <?php 
              $query = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE polsek = '$unit' AND nama_team = '$team' AND status_tersangka = 'belum tertangkap'");
              foreach ($query as $key => $value) { ?>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="../../../image/mysterius.png" class="card-img" alt="foto tersangka">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                            <strong class="card-title mb-2">Target Sasaran </strong>
                                <h5 class="card-title"><?= $value['an_tersangka'];?></h5>
                                <p class="card-text">Jenis Kelamin : <?= $value['jenis_kelamin'];?>
                                <br>Tanggal Lahir : <?= $value['tgl_lahir'];?>
                                <br>Agama : <?= $value['agama'];?>
                                <br>Pendidikan : <?= $value['pendidikan_terakhir'];?>
                                <br>Pekerjaan : <?= $value['pekerjaan'];?>
                                <br>Warganegara : <?= $value['warganegara'];?>
                                <p class="card-text"><small class="text-muted"><?= $value['tanggal'];?></small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php } ?>
            </div>

            <!-- PENUTUP IF -->
              <?php }else{ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <strong class="card-title">Anda tidak memiliki tugas penangkapan </strong><img src="../../../asset/gif/blue-sirene.gif" style="height:30px;">
                            </div>
                           
                        </div>
                    </div>
                </div>
                </div>
              <?php } ?>


                
               
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

    
    
</body>
</html>
