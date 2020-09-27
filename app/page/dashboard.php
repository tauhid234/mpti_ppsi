<?php
session_start();
$infoSession = "<script>toastr.success('Success', 'tes')</script>";
if(!isset($_SESSION["nrp"])){
    header("location:../authentication/index.php");
}

?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | DASHBOARD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://zenodo.org/api/files/00000000-0000-0000-0000-000000000000/socialsciencepolicing/logo.jpg">
    <link rel="shortcut icon" href="https://zenodo.org/api/files/00000000-0000-0000-0000-000000000000/socialsciencepolicing/logo.jpg">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../asset/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../../asset/css/style.css">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--MAPBOX API-->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
    
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

</head>

<style>
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
</style>

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
                                        <!--i class="pe-7s-cash"></i-->
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">23569</span></div>
                                            <div class="stat-heading">Barang Bukti</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">2986</span></div>
                                            <div class="stat-heading">Jumlah Napi</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <div id="map" style="width: 100%; height: 450px;"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <div id="columnchart_material" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div-->

              <!--div class="row">
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Status Data Pencarian Orang </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table" style="text-align:center;">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                    <th class="avatar">Foto</th>
                                                    <th>Nama</th>
                                                    <th>Tanggal Penyelidikan</th>
                                                    <th>Tanggal Penangkapan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td class="avatar">
                                                        <div class="round-img">
                                                            <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                                                        </div>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <span class="badge badge-complete">Complete</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                        </div-->
               
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
    <script src="../../asset/js/main.js"></script>

    <!--Local Stuff-->
    <script type="text/javascript">
    //   google.charts.load('current', {'packages':['bar']});
    //   google.charts.setOnLoadCallback(drawChart);

    //   function drawChart() {
    //     var data = google.visualization.arrayToDataTable([
    //       ['Bulan', 'Narkotika'],
    //       ['Januari', 0],
    //       ['Febuari', 0],
    //       ['Maret', 0],
    //       ['April', 0],
    //       ['Mei', 0],
    //       ['Juni', 0],
    //       ['Juli', 0],
    //       ['Agustus', 0],
    //       ['September', 0],
    //       ['Oktober', 0],
    //       ['November', 0],
    //       ['Desember', 0],
    //     ]);

    //     var options = {
    //       chart: {
    //         title: 'Statistik Kasus Narkoba Per Bulan',
    //         subtitle: 'Tahun 2020',
    //       }
    //     };

    //     var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    //     chart.draw(data, google.charts.Bar.convertOptions(options));
    //   }

mapboxgl.accessToken = 'pk.eyJ1IjoidGF1aGlkOTgiLCJhIjoiY2tlcTZsMW1iMHB6dzJ6b2l2ZWtmMDdoMyJ9.R4wgtk_pbaHweQ5jC5qV_A';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [12.550343, 55.665957],
zoom: 8
});
 
var marker = new mapboxgl.Marker()
.setLngLat([12.550343, 55.665957])
.addTo(map);
</script>

    
    
</body>
</html>
