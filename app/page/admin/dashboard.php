<?php
session_start();
if(!isset($_SESSION["nrp"])){
    header("location:../../authentication/index.php");
}
if($_SESSION["status_user"]!="admin"){
    header("location:../intel/dashboard.php");
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
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-danger">
                            <div class="card-body">
                            <?php 
                    $count1 = mysqli_query($conn,"SELECT * FROM laporan_proses WHERE YEAR(tanggal_proses) = '2020' AND unit = '$unit' AND status_laporan = 'sudah selesai'");
                    $data1 = mysqli_num_rows($count1);?>
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-5">
                                    <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text text-white"><span class="count"><?= $data1; ?></span></div>
                                            <div class="stat-heading text-white">Jumlah Kasus</div>
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
                        <div class="card bg-warning">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text text-white"><span class="count"><?= $data; ?></span></div>
                                            <div class="stat-heading text-white">Jumlah Napi</div>
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
                                <strong class="card-title">Laporan awal penugasan</strong>
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
                            <img src="../../../image/<?= $value['foto_tersangka'];?>" class="card-img" alt="foto tersangka">
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
            {center: new google.maps.LatLng(-7.090910999999999, 107.668887), zoom: 6, mapTypeId: google.maps.MapTypeId.ROADMAP});

            const contentString = "<h1>Hello word</h1>";

        var iconBase =
            '../../../../asset/icon/';

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


        var infowindow = new google.maps.InfoWindow(), marker,i;

        var markers = [
            <?php 
              $datamaps = mysqli_query($conn,"SELECT laporan.*, surat_tugas.* FROM laporan,surat_tugas WHERE laporan.unit = '$unit' AND laporan.nomer_kasus = surat_tugas.nomer_kasus");
              foreach ($datamaps as $key => $value) {
                  $text = ' " <strong>FOTO LOKASI</strong><br><br><img src=https://satresnarkoba.com/image/'.$value["foto_lokasi"].' width=150 height=150><br><br><br>Tanggal Penugasan : '.$value['tanggal'].' <br><strong>Laporan Nomer Kasus : '. $value["nomer_kasus"] .'</strong><br><br>Nama tersangka : '.$value["an_tersangka"]. '<br>Jenis Kelamin : '.$value['jenis_kelamin'].' <br>Agama : '.$value['agama'].' <br>Pendidikan Terakhir : '.$value['pendidikan_terakhir'].' <br>Pekerjaan : '.$value['pekerjaan'].' <br>Warganegara : '.$value['warganegara'].' <br>Keterangan : '. $value["keterangan"] .' " ';
                  echo '['. $text . ',' .$value['latitude']. ',' .$value['longtitude']. '],';
              }
              ?>
    //   ['Taman Nasional Gunung Gede Pangrango', -6.777797700000000000 , 106.948689100000020000],
    //   ['Gunung Papandayan', -7.319999999999999000, 107.730000000000020000],
    //   ['Gunung Cikuray', -7.3225, 107.86000000000001],
    //   ['Gunung Bromo', -7.942493600000000000, 112.953012199999990000],
    //   ['Gunung Semeru', -8.1077172, 112.92240749999996],
    //   ['Gunung Merapi', -7.540717500000000000, 110.445724100000000000],
    //   ['Gunung Merbabu', -7.455000000000001000, 110.440000000000050000],
    //   ['Gunung Prau', -7.1869444, 109.92277779999995]
    ];


        var features = [
          {
            position: new google.maps.LatLng(-7.090910999999999, 107.668887),
            type: 'intel',
            title : "Tester",
            content : "tester"
          },
        ];

        // const infowindow = new google.maps.InfoWindow({
        //   content: contentString,
        // });

        // Create markers.
//         for (var i = 0; i < features.length; i++) {
//           var marker = new google.maps.Marker({
//             position: features[i].position,
//             icon: icons[features[i].type].icon,
//             map: map,
//             title: "tes"
//           });

          
//         marker.addListener("click", () => {
//         infowindow.setContent(features[i].content);
//         infowindow.open(map, marker);
        
//   });
//         }




for (var i = 0; i < markers.length; i++) {
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(markers[i][1], markers[i][2]),
            map: map,
            icon: "https://satresnarkoba.com/asset/icon/police_intel.png",
            title: "tes"
          });

          
          google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(markers[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
        }
      }
</script>

    
    
</body>
</html>
