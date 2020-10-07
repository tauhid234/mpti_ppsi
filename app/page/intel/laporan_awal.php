<?php 
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}

$unit = $_SESSION["unit"];

$alert = "";

if(isset($_POST["submit"])){
    $foto = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $ket = $_POST["keterangan"];
    $lat = $_POST["ltd"];
    $lot = $_POST["lty"];
    $tgl = date("Y-m-d");

    if($foto==""||$ket==""||$lat==""||$lot==""){
        $alert = "<script>swal('Gagal','Inputan field masih ada yang belum di isi','error')</script>";
    }else{
        move_uploaded_file($file_tmp,'../../../image/'.$foto);
        mysqli_query($conn,"INSERT INTO laporan_awal (unit,latitude,longtitude,keterangan,foto_location,tanggal)
                    VALUES ('$unit','$lat','$lot','$ket','$foto','$tgl')");
        $alert = "<script>swal('Sukses','Data laporan awal disimpan','success')</script>";
    }
}
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | LAPORAN AWAL</title>
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
                    <h5 class="mb-4">Laporan Awal</h5>
                    <p><a href="input_laporan_awal.php" class="btn btn-primary">Input laporan awal</a></p>
                </div>
            </div>

            <div class="row">
            <?php 
            $query = mysqli_query($conn,"SELECT * FROM laporan_awal WHERE status = 'awal' AND unit = '$unit'");
            foreach ($query as $q => $value) {
            ?>
                <div class="col-md-6">
                    <div class="card">
                        <!-- <img src="../../../image/<?= $value['foto_location']; ?>" style="width:100%; height:200px;"> -->
                        <iframe
                            width="100%"
                            height="200"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/view?key=AIzaSyBYHSJymZYnSTdi3vH4Mh_H7b-jAgBOCag&center=<?= $value['latitude'];?>,<?=  $value['longtitude'];?>&zoom=18&maptype=satellite" allowfullscreen>
                            </iframe>
                            <iframe
                            width="100%"
                            height="200"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBYHSJymZYnSTdi3vH4Mh_H7b-jAgBOCag
                                &q=<?= $value['latitude'];?>,<?=  $value['longtitude'];?>" allowfullscreen>
                            </iframe>
                        <div class="card-body">
                            <br><br><i class="menu-icon fa fa-map-marker"></i> <?= $value['unit'];?>
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item">Keterangan : <?= $value['keterangan']; ?></li>
                                <li class="list-group-item"><?= $value['tanggal']; ?></li>
                                </ul>
                                
                        </div>
                    </div>
                </div>
            <?php } ?>
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
    <script>
var x = document.getElementById("ltd");
var y = document.getElementById("lty");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 
}

function showPosition(position) {
  x.value = position.coords.latitude;
  y.value = position.coords.longitude;
}
</script>
         <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../../asset/js/main.js"></script>

    <!--Local Stuff-->
  
    
</body>
</html>