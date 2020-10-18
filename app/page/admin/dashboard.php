<?php
session_start();
$infoSession = "<script>toastr.success('Success', 'tes')</script>";
if(!isset($_SESSION["nrp"])){
    header("location:../../authentication/index.php");
}
$unit = $_SESSION["unit"];
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

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../../asset/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../../asset/css/style.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzwRmT2nf0K-oT7TZ5gQc4WoQ3xRkyrnc&callback=initMap"></script>

    
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
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-box"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">0</span></div>
                                            <div class="stat-heading">Barang Bukti</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    $count = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE status_tersangka = 'tertangkap'");
                    $data = mysqli_num_rows($count);?>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?= $data; ?></span></div>
                                            <div class="stat-heading">Jumlah Napi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div id="map" style="height: 400px;"></div>
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

                <!-- </div> -->
               
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
      
            var map;
      function initMap() {
        map = new google.maps.Map(
            document.getElementById('map'),
            {center: new google.maps.LatLng(-7.090910999999999, 107.668887), zoom: 16});

            const contentString = "<h1>Hello word</h1>";

        var iconBase =
            '../../../asset/icon/';

        var icons = {
          parking: {
            icon: iconBase + 'parking_lot_maps.png'
          },
          intel: {
            icon: iconBase + 'police_intel.png'
          },
          info: {
            icon: iconBase + 'info-i_maps.png'
          }
        };



        var features = [
          {
            position: new google.maps.LatLng(-7.090910999999999, 107.668887),
            type: 'intel',
            title : "Tester"
          },
        ];

        const infowindow = new google.maps.InfoWindow({
          content: contentString,
        });

        // Create markers.
        for (var i = 0; i < features.length; i++) {
          var marker = new google.maps.Marker({
            position: features[i].position,
            icon: icons[features[i].type].icon,
            map: map,
            title: "tes"
          });
        };
        marker.addListener("click", () => {
    infowindow.open(map, marker);
  });
      }
</script>

    
    
</body>
</html>
