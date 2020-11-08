<?php 
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
if($_SESSION["status_user"]!="intel"){
    header("location:../admin/dashboard.php");
}

$unit = $_SESSION["unit"];
$team = $_SESSION["nama_team"];

$alert = "";

$query = mysqli_query($conn,"SELECT nomer_kasus FROM surat_tugas WHERE nama_team = '$team' AND polsek = '$unit' AND status_tersangka = 'belum tertangkap' ORDER BY id DESC LIMIT 1");
    $data = mysqli_fetch_array($query);
    $kasus = $data["nomer_kasus"];

if(isset($_POST["submit"])){
    $ket = $_POST["keterangan"];
    $lat = $_POST["ltd"];
    $lot = $_POST["lty"];
    $tgl = date("Y-m-d");
    $ks = $_POST['kasus'];

    $foto = $_FILES["file"]["name"];
    $file = $_FILES["file"]["tmp_name"];

    if($ket==""||$lat==""||$lot==""||$foto==""){
        $alert = "<script>swal('Gagal','Inputan field masih ada yang belum di isi','error')</script>";
    }else{
        move_uploaded_file($file,'../../../image/'.$foto);
        mysqli_query($conn,"INSERT INTO laporan (id,unit,nama_team,foto_lokasi,latitude,longtitude,keterangan,tanggal,status_laporan,nomer_kasus,proses_laporan)
                    VALUES ('','$unit','$team','$foto','$lat','$lot','$ket','$tgl','awal','$ks','')");
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
        <div class="content">
         <!-- Animated -->
        <?= $alert; ?>
         <div class="animated fadeIn">

            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-6">
                    <h5 class="mb-4">Input Laporan Awal</h5>
                </div>
            </div>

            <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="nama">Foto Lokasi</label>
                            <input type="file" class="form-control" id="file" name="file"/>
                        </div>
                        <div class="form-group col-md-6">
                        <label for="kasus">No.Kasus</label>
                            <input type="text" class="form-control" id="kasus" name="kasus" value="<?= $kasus;?>" readonly/>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="latitude">Latitude</label>
                            <input readonly type="text" class="form-control" id="ltd" name="ltd">
                        </div>
                        <div class="form-group col-md-6">
                        <label for="longitude">Longitude</label>
                            <input readonly type="text" class="form-control" id="lty" name="lty">
                        </div>
                    </div>
                    
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>
                    </div>
                    <p id="demo"></p>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-warning" onclick="getLocation()">Cek Lokasi</button>
                        </form>
                    </div>
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