<?php
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}

$alert = "";
$nrp = $_SESSION["nrp"];


if(isset($_POST["submit"])){

    $pb = $_POST["pb"];
    $kp = $_POST["kp"];
    $hash = password_hash($kp,PASSWORD_DEFAULT);
    if($pb==""||$kp==""){
        $alert = "<script>swal('Gagal', 'Field input masih ada yang kosong', 'error');</script>";
    }elseif($kp!=$pb){
        $alert = "<script>swal('Gagal', 'Konfirmasi password tidak sama dengan password baru', 'error');</script>";
    }else{
        mysqli_query($conn,"UPDATE user SET password = '$hash' WHERE nrp = '$nrp'");
        $alert = "<script>swal('success', 'Password berhasil dirubah', 'success');</script>";
    }

    }


?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | GANTI PASSWORD</title>
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
    
    <!--SWEET ALERT-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
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
        <?= $alert; ?>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-6">
                    <h5>Ganti Password</h5>
                </div>
            </div>
               <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                    <form method="post" action="">
                    
                   
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="pb">Password Baru</label>
                            <input type="password" class="form-control" id="pb" name="pb">
                            </div>
                            <div class="form-group col-md-12">
                            <label for="kp">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="kp" name="kp">
                             </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </form>
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

    function cekumur(){
      console.log("tes");
      var tgl_lahir = document.getElementById('tgl_lahir').value;
      var gethari = new Date();
      var ulg_tahun = new Date(tgl_lahir);
      var umur = gethari.getFullYear() - ulg_tahun.getFullYear();
      document.getElementById('umur').value = umur;
      console.log(umur);
    }
    
    function fileValidation(){
    var fileInput = document.getElementById('file');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    if(!allowedExtensions.exec(filePath)){
        toastr.warning("Peringatan","Extensi file yang di perbolehkan format jpg / jpeg / png");
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
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
