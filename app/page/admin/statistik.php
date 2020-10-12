<?php 
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}

$unit = $_SESSION["unit"];

$alert = "";
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
                            <canvas id="laporan_awal"></canvas>
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
                            data: [2,
                                   0,
                                   0,
                                   0,
                                   0,
                                   0,
                                   0,
                                   0,
                                   0,
                                   0,
                                   0],
                            
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


    </script>
    
</body>
</html>