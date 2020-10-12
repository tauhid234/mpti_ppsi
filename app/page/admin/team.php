<?php
session_start();
include("../../../server/config.php");
$infoSession = "<script>toastr.success('Success', 'tes')</script>";
if(!isset($_SESSION["nrp"])){
    header("location:../../authentication/index.php");
}
$unit = $_SESSION["unit"];
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | TEAM</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    
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
                    <h5>Team</h5>
                </div>
            </div>

            <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size:12px">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="team1-tab" data-toggle="tab" href="#team1" role="tab" aria-controls="team1" aria-selected="true">Team Eradicate Drugs</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="team2-tab" data-toggle="tab" href="#team2" role="tab" aria-controls="team2" aria-selected="false">Team Knights Prime of Power</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="team3-tab" data-toggle="tab" href="#team3" role="tab" aria-controls="team3" aria-selected="false">Team Eagle Eye Knights</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="team4-tab" data-toggle="tab" href="#team4" role="tab" aria-controls="team4" aria-selected="false">Team Valkyrie Light</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="team5-tab" data-toggle="tab" href="#team5" role="tab" aria-controls="team5" aria-selected="false">Team Wild Crime</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="team6-tab" data-toggle="tab" href="#team6" role="tab" aria-controls="team6" aria-selected="false">Team Top Thunder Squad</a>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-md-12">
                            <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="team1" role="tabpanel" aria-labelledby="team1-tab">
                                <ul class="list-group list-group-flush">
                                    <?php $data = mysqli_query($conn,"SELECT nama_anggota FROM team WHERE unit = '$unit' AND nama_team = 'Eradicate Drugs'");
                                    while($value = mysqli_fetch_array($data)){ ?>
                                    <li class="list-group-item"><a href="detail_anggota_team.php?_hash=<?= base64_encode($value['nama_anggota']);?>"><?= $value['nama_anggota'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="tab-pane fade show" id="team2" role="tabpanel" aria-labelledby="team2-tab">
                                <ul class="list-group list-group-flush">
                                    <?php $data2 = mysqli_query($conn,"SELECT nama_anggota FROM team WHERE unit = '$unit' AND nama_team = 'Knights Prime of Power'");
                                    while($value2 = mysqli_fetch_array($data2)){ ?>
                                    <li class="list-group-item"><a href="detail_anggota_team.php?_hash=<?= base64_encode($value2['nama_anggota']);?>"><?= $value2['nama_anggota'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="tab-pane fade show" id="team3" role="tabpanel" aria-labelledby="team3-tab">
                                <ul class="list-group list-group-flush">
                                    <?php $data3 = mysqli_query($conn,"SELECT nama_anggota FROM team WHERE unit = '$unit' AND nama_team = 'Eagle Eye Knights'");
                                    while($value3 = mysqli_fetch_array($data3)){ ?>
                                    <li class="list-group-item"><a href="detail_anggota_team.php?_hash=<?= base64_encode($value3['nama_anggota']);?>"><?= $value3['nama_anggota'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="tab-pane fade show" id="team4" role="tabpanel" aria-labelledby="team4-tab">
                                <ul class="list-group list-group-flush">
                                    <?php $data4 = mysqli_query($conn,"SELECT nama_anggota FROM team WHERE unit = '$unit' AND nama_team = 'Valkyrie Light'");
                                    while($value4 = mysqli_fetch_array($data4)){ ?>
                                    <li class="list-group-item"><a href="detail_anggota_team.php?_hash=<?= base64_encode($value4['nama_anggota']);?>"><?= $value4['nama_anggota'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="tab-pane fade show" id="team5" role="tabpanel" aria-labelledby="team5-tab">
                                <ul class="list-group list-group-flush">
                                    <?php $data5 = mysqli_query($conn,"SELECT nama_anggota FROM team WHERE unit = '$unit' AND nama_team = 'Wild Crime'");
                                    while($value5 = mysqli_fetch_array($data5)){ ?>
                                    <li class="list-group-item"><a href="detail_anggota_team.php?_hash=<?= base64_encode($value5['nama_anggota']);?>"><?= $value5['nama_anggota'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="tab-pane fade show" id="team6" role="tabpanel" aria-labelledby="team6-tab">
                                <ul class="list-group list-group-flush">
                                    <?php $data6 = mysqli_query($conn,"SELECT nama_anggota FROM team WHERE unit = '$unit' AND nama_team = 'Top Thunder Squad'");
                                    while($value6 = mysqli_fetch_array($data6)){ ?>
                                    <li class="list-group-item"><a href="detail_anggota_team.php?_hash=<?= base64_encode($value2['nama_anggota']);?>"><?= $value6['nama_anggota'];?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
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