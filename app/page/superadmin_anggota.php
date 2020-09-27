<?php 
session_start();
include("../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../authentication/index.php");
}
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | SUPERADMIN ANGGOTA</title>
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
         <!-- Animated -->
         <div class="animated fadeIn">

            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-6">
                    <h5>Superadmin Anggota</h5>
                </div>
            </div>
        
            <div class="row">
            <?php 
            $query = mysqli_query($conn,"SELECT * FROM user WHERE status_user = 'superadmin'");
            foreach ($query as $q => $value) {
            ?>
                <div class="col-md-6">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="../../image/<?= $value['foto']; ?>" style="width:200px; height:200px; border-radius:250px; margin-left:10px; margin-top:10px;" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= strtoupper($value['nama']);?><br><br><i class="menu-icon fa fa-map-marker"></i> <?= $value['alamat'];?></h5>
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item">NRP : <?= $value['nrp'];?></li>
                                <li class="list-group-item">Tanggal Lahir : <?= $value['tgl_lahir']; ?></li>
                                <li class="list-group-item">Umur : <?= $value['umur'];?> Th</li>
                                <li class="list-group-item">Berat Badan : <?= $value['berat_badan'];?> Kg</li>
                                <li class="list-group-item">Tinggi Badan : <?= $value['tinggi_badan'];?> Cm</li>
                                <li class="list-group-item">Email : <?= $value['email'];?></li>
                                <li class="list-group-item">No.HP : <?= $value['no_hp'];?></li>
                                </ul>
                            <a href="edit_anggota.php?nrp=<?= base64_encode($value['nrp']);?>" class="btn btn-primary" style="color:white; margin-top:10px;">Edit</a>
                            <a href="https://api.whatsapp.com/send?phone=<?= str_replace("0","62",$value['no_hp']);?>" class="btn btn-success" style="color:white; margin-top:10px;">Whatsapp</a>
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


         <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../asset/js/main.js"></script>

    <!--Local Stuff-->
  
    
</body>
</html>