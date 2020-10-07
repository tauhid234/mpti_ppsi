<?php
session_start();
$infoSession = "<script>toastr.success('Success', 'tes')</script>";
if(!isset($_SESSION["nrp"])){
    header("location:../../authentication/index.php");
}
$unit = $_SESSION['unit'];
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzwRmT2nf0K-oT7TZ5gQc4WoQ3xRkyrnc&callback=initMap"></script>

    <!--MAPBOX API-->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    
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
        <?= $infoSession; ?>
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="map" style="width: 100%; height: 450px;"></div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <strong class="card-title">Daftar Tersangka belum tertangkap</strong>
                            </div>
                           
                        </div>
                    </div>
                </div>
                </div>

            <div class="row">
              <?php 
              $query = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE polsek = '$unit' AND status_tersangka = 'belum tertangkap'");
              foreach ($query as $key => $value) { ?>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="../../../image/mysterius.png" class="card-img" alt="foto tersangka">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['an_tersangka'];?></h5>
                                <p class="card-text">Jenis Kelamin : <?= $value['jenis_kelamin'];?>
                                <br>Tanggal Lahir : <?= $value['tgl_lahir'];?>
                                <br>Agama : <?= $value['agama'];?>
                                <br>Pendidikan : <?= $value['pendidikan_terakhir'];?>
                                <br>Pekerjaan : <?= $value['pekerjaan'];?>
                                <br>Warganegara : <?= $value['warganegara'];?>
                                <br><br><a target="blank" href="https://maps.google.com/?q=<?= urlencode($value['alamat']); ?>"><i class="fa fa-map-marker"></i> Lokasi DPO</a></p>
                                <p class="card-text"><small class="text-muted"><?= $value['tanggal'];?></small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php } ?>
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

function initMap() {
  // The location of Uluru
  var uluru = {lat: -5.7759361, lng: 106.1174583};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 4, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
</script>

    
    
</body>
</html>
