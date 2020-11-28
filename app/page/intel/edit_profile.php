<?php
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
if($_SESSION["status_user"]!="intel"){
    header("location:../admin/dashboard.php");
}

$alert = "";
$sesi = $_SESSION["status_user"];
if(isset($_GET['nrp'])){
    $nrp = base64_decode($_GET['nrp']);

if(isset($_POST["submit"])){
    $nama = strtolower($_POST["name"]);
    $tgl_lahir = $_POST["tgl_lahir"];
    $umur = $_POST["umur"];
    $bb = $_POST["berat"];
    $tb = $_POST["tinggi"];
    $email = $_POST["email"];
    $hp = $_POST["handphone"];
    $addres = $_POST["address"];

    
    $foto = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if($nama==""||$tgl_lahir==""||$umur==""||$bb==""||$tb==""||$email==""||$hp==""){
        $alert = "<script>swal('Gagal', 'Field masih ada yang belum di isi', 'error');</script>";
    }elseif ($addres=="") {
        if($foto==""){
        $query = mysqli_query($conn,"UPDATE user SET nama='$nama', tgl_lahir='$tgl_lahir', umur='$umur', berat_badan='$bb',
                tinggi_badan='$tb', email='$email', no_hp='$hp' WHERE nrp = '$nrp'");
        $alert = "<script>swal('Success', 'Data berhasil diupdate', 'success');</script>";
        }
        else{
            move_uploaded_file($file_tmp,'../../../image/'.$foto);
            $query = mysqli_query($conn,"UPDATE user SET nama='$nama', foto='$foto', tgl_lahir='$tgl_lahir', umur='$umur', berat_badan='$bb',
            tinggi_badan='$tb', email='$email', no_hp='$hp' WHERE nrp = '$nrp'");
            $alert = "<script>swal('Success', 'Data berhasil diupdate', 'success');</script>";
        }
    }else{
        if($foto==""){
            $query = mysqli_query($conn,"UPDATE user SET nama='$nama', tgl_lahir='$tgl_lahir', umur='$umur', berat_badan='$bb',
                    tinggi_badan='$tb', email='$email', no_hp='$hp', alamat='$addres' WHERE nrp = '$nrp'");
            $alert = "<script>swal('Success', 'Data berhasil diupdate', 'success');</script>";
            }
            else{
                move_uploaded_file($file_tmp,'../../../image/'.$foto);
                $query = mysqli_query($conn,"UPDATE user SET nama='$nama', foto='$foto', tgl_lahir='$tgl_lahir', umur='$umur', berat_badan='$bb',
                tinggi_badan='$tb', email='$email', no_hp='$hp', alamat='$addres' WHERE nrp = '$nrp'");
                $alert = "<script>swal('Success', 'Data berhasil diupdate', 'success');</script>";
            }
    }
}
}
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | EDIT PROFILE</title>
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
        <?php 
    $query = mysqli_query($conn,"SELECT * FROM user WHERE nrp = '$nrp'");
    $data = mysqli_fetch_array($query);
    ?>
            <!-- Animated -->
            <div class="animated fadeIn">
            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-6">
                    <h5>Edit Profile</h5>
                </div>
            </div>
               <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                    
                    <div id="imagePreview" style="width:100px; height:100px;">
                        <img src="../../../image/<?=$data['foto'];?>">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="nama">Foto</label>
                            <input type="file" class="form-control" id="file" name="file" onchange="return fileValidation()"/>
                        </div>
                    </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $data['nama'];?>">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="nama">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'];?>">
                             </div>
                            <div class="form-group col-md-4">
                            <label for="nama">Umur</label>
                            <input type="text" readonly class="form-control" id="umur" name="umur" value="<?= $data['umur'];?>" onclick="cekumur();">                            
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="berat">Berat Badan</label>
                                <input type="number" class="form-control" min="0" max="100" id="berat" name="berat" value="<?= $data['berat_badan'];?>">
                                <div id="invalid-berat" style="color:red;"></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tinggi">Tinggi Badan</label>
                                <input type="number" class="form-control" id="tinggi" name="tinggi" value="<?= $data['tinggi_badan'];?>">
                                <div id="invalid-tinggi" style="color:red;"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $data['email'];?>">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">No.HP</label>
                            <input type="number" class="form-control" id="handphone" name="handphone" value="<?= $data['no_hp'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <textarea class="form-control" id="address" name="address" value="<?= $data['address'];?>"></textarea>
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
