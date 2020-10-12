<?php
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
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
        <?= $alert; ?>
            <!-- Animated -->
            <div class="animated fadeIn">
            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-6">
                    <h5>Input Data Tersangka</h5>
                </div>
            </div>

        <div class="row">
          <div class="col-md-12" style="padding-top:10px;">
            <form method="post" action="" enctype="multipart/form-data">
            <div id="imagePreview" style="width:100px; height:100px;"></div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="nama">Foto</label>
                        <input type="file" class="form-control" id="file" name="file" onchange="return fileValidation()"/>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nama">Nama Tersangka</label>
                        <input type="text" class="form-control" name="nama" id="nama" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="alias">Alias</label>
                        <input type="text" class="form-control" name="alias" id="alias" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="umur">Umur</label>
                        <input type="number" class="form-control" name="umur" id="alias" autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="warganegara">Warganegara</label>
                        <select class="form-control" name="warganegara" id="warganegara">
                            <option value="">-</option>
                            <option value="wni">WNI</option>
                            <option value="wna">WNA</option>
                        </select>
                     </div>
                     <div class="form-group col-md-4">
                        <label for="pasal">Pasal</label>
                        <select class="form-control" name="pasal" id="pasal">
                            <option value="">-</option>
                            <option value="Pasal 1 angka 3 jo Pasal 113">Pasal 1 angka 3 jo Pasal 113</option>
                            <option value="Pasal 1 angka 4 jo Pasal 113">Pasal 1 angka 4 jo Pasal 113</option>
                            <option value="Pasal 1 angka 5 jo Pasal 113">Pasal 1 angka 5 jo Pasal 113</option>
                            <option value="Pasal 1 angka 9, 12 jo Pasal 115">Pasal 1 angka 9, 12 jo Pasal 115</option>
                            <option value="Pasal 1 angka 6 jo 111,112, 129">Pasal 1 angka 6 jo 111,112, 129</option>
                            <option value="Pasal 1 angka 13 jo Pasal 54 jo Pasal 127">Pasal 1 angka 13 jo Pasal 54 jo Pasal 127</option>
                            <option value="Pasal 1 angka 15 jo Pasal 54 jo Pasal 127">Pasal 1 angka 15 jo Pasal 54 jo Pasal 127</option>
                        </select>
                     </div>
                </div>
                <div class="form-group">
                        <label for="inputAddress">Barang Bukti</label>
                        <textarea class="form-control" id="bbt" name="bbt"></textarea>
                </div>
                <div class="form-group">
                        <label for="inputAddress">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                </div>
                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </form>

                </div>
            </form>
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