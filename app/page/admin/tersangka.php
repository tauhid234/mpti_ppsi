<?php
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}
if($_SESSION["status_user"]!="admin"){
    header("location:../intel/dashboard.php");
}
$unit = $_SESSION["unit"];
$alert = "";
if(isset($_POST["submit"])){
    $sec= gettimeofday();
    $kdt = "KDT$sec[sec]";
    $kdl = "KDL$sec[sec]";
    $nama = strtolower($_POST["nama"]);
    $tgl = date("Y-m-d");
    $alias = $_POST["alias"];
    $umur = $_POST["umur"];
    $alamat = $_POST["alamat"];
    $pekerjaan = $_POST["pekerjaan"];
    $warganegara = $_POST["warganegara"];

    $pasal = $_POST["pasal"];
    $bbt = $_POST["bbt"];



    if($nama==""||$alias==""||$umur==""||$alamat==""||$pekerjaan=="" || $warganegara=="" || $pasal=="" || $bbt==""){
        $alert = "<script>swal('Gagal', 'Data masih ada yang belum di isi', 'error');</script>";
    }else{
        $foto = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        move_uploaded_file($file_tmp,'../../../image/'.$foto);
        $query = mysqli_query($conn,"INSERT INTO tersangka (kd_tersangka,kd_laporan,pasal,tanggal,nama,alias,umur,pekerjaan,warganegara,alamat,foto,unit,status_tersangka,barang_bukti) 
                             VALUES ('$kdt','$kdl','$pasal','$tgl','$nama','$alias','$umur','$pekerjaan','$warganegara','$alamat','$foto','$unit','belum tertangkap','$bbt')");
        $alert = "<script>swal('Sukses', 'Data berhasil disimpan', 'success');</script>";
    }


}
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | TERSANGKA</title>
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
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
        <?= $alert; ?>
            <!-- Animated -->
            <div class="animated fadeIn">
            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-6">
                    <a href="input_tersangka.php" class="btn btn-primary mb-4">Input Tersangka Baru</a>
                    <h5>Daftar Tersangka</h5>
                </div>
            </div>

        <div class="row">

        <?php 
            $query = mysqli_query($conn,"SELECT * FROM tersangka WHERE status_tersangka = 'tertangkap' AND unit = '$unit'");
            foreach ($query as $q => $value) {
            ?>
                <div class="col-md-6">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="../../../image/<?= $value['foto']; ?>" style="width:200px; height:200px; border-radius:250px; margin-left:10px; margin-top:10px;" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= strtoupper($value['nama']);?><br><br>Alias <?= $value['alias'];?></h5>
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item">Kode Tersangka : <?= $value['kd_tersangka'];?></li>
                                <li class="list-group-item">Kode Laporan : <?= $value['kd_laporan'];?></li>
                                <li class="list-group-item">Pasal : <?= $value['pasal'];?></li>
                                <li class="list-group-item">Umur : <?= $value['umur'];?></li>
                                <li class="list-group-item">Pekerjaan : <?= $value['pekerjaan'];?></li>
                                <li class="list-group-item">Warganegara : <?= $value['warganegara'];?></li>
                                <li class="list-group-item">Barang Bukti : <?= $value['barang_bukti'];?></li>
                                <li class="list-group-item">Tanggal Tertangkap : <?= $value['tanggal'];?></li>
                                <!-- <li class="list-group-item"><a href="#" onclick="window.print()" class="btn btn-primary">Print Data</a></li> -->
                                </ul>
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
    <script>

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