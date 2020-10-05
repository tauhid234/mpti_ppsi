<?php
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}

$alert = "";
if(isset($_POST["submit"])){
    $nama = strtolower($_POST["name"]);
    $tgl_lahir = $_POST["tgl_lahir"];
    $umur = $_POST["umur"];
    $bb = $_POST["berat"];
    $tb = $_POST["tinggi"];
    $email = $_POST["email"];
    $hp = $_POST["handphone"];
    $addres = $_POST["address"];
    $unit = $_POST["unit"];
    $pangkat = $_POST["pangkat"];
    $pass = $_POST["password"];
    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

    $foto = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];


    if($nama==""||$foto==""||$tgl_lahir==""||$umur==""||$bb==""||$tb==""||$email==""||$hp==""||$addres==""||$unit==""){
        $alert = "<script>swal('Gagal','Field masih ada yang belum di isi','error');</script>";
    }else{
        $timeday = gettimeofday();
        $getnrp = $timeday;
        move_uploaded_file($file_tmp,'../../../image/'.$foto);
        $query = mysqli_query($conn,"INSERT INTO user (nrp,password,nama,pangkat,foto,tgl_lahir,umur,berat_badan,tinggi_badan,email,no_hp,alamat,unit,status_user) 
                             VALUES ('$getnrp[sec]','$hash_pass','$nama','$pangkat','$foto','$tgl_lahir','$umur','$bb','$tb','$email','$hp','$addres','$unit','admin')");
        $alert = "<script>swal('Success','Data berhasil di simpan','success');</script>";
    }


}
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | ADMIN BARU</title>
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
                    <h5>Admin Baru</h5>
                </div>
            </div>
               <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
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
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="nama">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                             </div>
                            <div class="form-group col-md-4">
                            <label for="nama">Umur</label>
                            <input type="text" readonly class="form-control" id="umur" name="umur" onclick="cekumur();">                            
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="berat">Berat Badan</label>
                                <input type="number" class="form-control" min="0" max="100" id="berat" name="berat">
                                <div id="invalid-berat" style="color:red;"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tinggi">Tinggi Badan</label>
                                <input type="number" class="form-control" id="tinggi" name="tinggi">
                                <div id="invalid-tinggi" style="color:red;"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tinggi">Pangkat</label>
                                <select class="form-control" name="pangkat" id="pangkat">
                                    <option value="">-</option>
                                    <option value="BRIPDA">BRIPDA</option>
                                    <option value="BRIPKA">BRIPKA</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputEmail4">No.HP</label>
                            <input type="number" class="form-control" id="handphone" name="handphone">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputEmail4">Unit Polsek</label>
                            <select name="unit" class="form-control">
                                <option value="">-</option>
                              <optgroup label="SUB Jakarta Selatan">
                                <option value="Polsek Pancoran">Polsek Pancoran</option>
                                <option value="Polsek Kebayoran Lama">Polsek Kebayoran Lama</option>
                                <option value="Polsek Metro Setiabudi">Polsek Metro Setiabudi</option>
                                <option value="Polsek Pesanggrahan">Polsek Pesanggrahan</option>
                                <option value="Polsek Jagakarsa">Polsek Jagakarsa</option>
                                <option value="Polsek Pasar Minggu">Polsek Pasar Minggu</option>
                                <option value="Polsek Cengkareng">Polsek Cengkareng</option>
                              <optgroup>
                              <optgroup label="SUB Jakarta Utara">
                                <option value="Polsek Tanjung Priok">Polsek Tanjung Priok</option>
                                <option value="Polsek Penjaringan">Polsek Penjaringan</option>
                                <option value="Polsek Kelapa Gading">Polsek Kelapa Gading</option>
                                <option value="Polsek Metro Koja">Polsek Metro Koja</option>
                                <option value="Polsek Cilincing">Polsek Cilincing</option>
                                <option value="Polsek Pademangan">Polsek Pademangan</option>
                                <option value="Polsek Kemayoran">Polsek Kemayoran</option>  
                              </optgroup>
                              <optgroup label="SUB Jakarta Timur">
                                <option value="Polsek Matraman">Polsek Matraman</option>
                                <option value="Polsek Jatinegara">Polsek Jatinegara</option>
                                <option value="Polsek Cakung">Polsek Cakung</option>
                                <option value="Polsek Kramat Jati">Polsek Kramat Jati</option>
                                <option value="Polsek Duren Sawit">Polsek Duren Sawit</option>
                                <option value="Polsek Cipayung">Polsek Cipayung</option>
                                <option value="Polsek Ciracas">Polsek Ciracas</option>
                                <option value="Polsek Pasar Rebo">Polsek Pasar Rebo</option>
                                <option value="Polsek Makasar Pinang Ranti">Polsek Makasar Pinang Ranti</option>
                                <option value="Polsek Kebon Sereh">Polsek Kebon Sereh</option>
                                <option value="Polsek Johar Baru">Polsek Johar Baru</option>
                              </optgroup>
                              <optgroup label="SUB Jakarta Pusat">
                                <option value="Polsek Sawah Besar">Polsek Sawah Besar</option>
                                <option vlaue="Polsek Kemayoran">Polsek Kemayoran</option>
                                <option value="Polsek Metro Tanah Abang">Polsek Metro Tanah Abang</option>
                                <option value="Polsek Metro Gambir">Polsek Metro Gambir</option>
                                <option value="Polsek Senen">Polsek Senen</option>
                              </optgroup>
                              <optgroup label="SUB Jakarta Barat">
                                <option value="Polsek Kebon Jeruk">Polsek Kebon Jeruk</option>
                                <option value="Polsek Tanjung Duren">Polsek Tanjung Duren</option>
                                <option value="Polsek Palmerah">Polsek Palmerah</option>
                                <option value="Polsek Tambora">Polsek Tambora</option>
                                <option value="Polsek Kalideres">Polsek Kalideres</option>
                                <option value="Polsek Taman Sari">Polsek Taman Sari</option>
                                <option value="Polsek Kembangan">Polsek Kembangan</option>
                              </optgroup>
                            </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <textarea class="form-control" id="address" name="address"></textarea>
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
