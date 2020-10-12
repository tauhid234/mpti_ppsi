<?php
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("location:../../authentication/index.php");
}

$unit = $_SESSION["unit"];
$alert = "";

if(isset($_POST["submit"])){
    $nama = $_POST["anggota"];
    $team = $_POST["team"];

    $implode = implode(',',$nama);

    $data = mysqli_query($conn,"SELECT nama_anggota FROM team WHERE nama_anggota = '$nama'");
    
    $count = mysqli_num_rows($data);

    if($nama==""||$team==""){
        $alert = "<script>swal('Peringatan','Inputan masih ada yang belum di isi','warning')</script>";
    }elseif($count == 1){
        $alert = "<script>swal('Infomrasi','Nama Anggota sudah masuk ke team','info')</script>";
    }else{
        mysqli_query($conn,"INSERT INTO team (id,unit,nama_anggota,nama_team) VALUES ('','$unit','$implode','$team')");
         $alert = "<script>swal('Sukses','Team berhasil dibuat','success')</script>";
    }
}
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | BUAT TEAM</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://zenodo.org/api/files/00000000-0000-0000-0000-000000000000/socialsciencepolicing/logo.jpg">
    <link rel="shortcut icon" href="https://zenodo.org/api/files/00000000-0000-0000-0000-000000000000/socialsciencepolicing/logo.jpg">

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
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
        <?= $alert; ?>
            <!-- Animated -->
            <div class="animated fadeIn">
            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-6">
                    <h5>Buat Team</h5>
                </div>
            </div>

            <div class="row">
            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                    <form method="post" action="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Nama Anggota</label>
                            <?php 
                            $query = mysqli_query($conn,"SELECT nama_anggota FROM team WHERE unit = '$unit'");
                            $exp = mysqli_fetch_array($query);
                            $data2 = explode(',',$exp['nama_anggota']);
                            foreach ($data2 as $key => $value) { ?>
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="anggota[]" value="<?= $value;?>" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                <?= $value;?>
                            </label>
                            </div>
                            <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">Nama Team</label>
                            <select name="team" class="form-control">
                                <option value="">-</option>
                                <option value="Eradicate Drugs">Eradicate Drugs</option>
                                <option value="Knights Prime of Power">Knights Prime of Power</option>
                                <option value="Eagle Eye Knights">Eagle Eye Knights</option>
                                <option value="Valkyrie Light">Valkyrie Light</option>
                                <option value="Wild Crime">Wild Crime</option>
                                <option value="Top Thunder Squad">Top Thunder Squad</option>

                            </select>
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