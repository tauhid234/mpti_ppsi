<?php
session_start();
include("../../../server/config.php");
$infoSession = "<script>toastr.success('Success', 'tes')</script>";
if(!isset($_SESSION["nrp"])){
    header("location:../../authentication/index.php");
}
if($_SESSION["status_user"]!="admin"){
    header("location:../intel/dashboard.php");
}
$unit = $_SESSION["unit"];
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | TEAM</title>

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
                            <table class="table table-striped">
                                        <tr>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                        </tr>
                                        <tr>
                                    <?php $data = mysqli_query($conn,"SELECT * FROM user WHERE unit = '$unit' AND nama_team = 'Eradicate Drugs'");
                                    while($value = mysqli_fetch_array($data)){ ?>
                                           <td><?= $value['nrp']; ?></td>
                                            <td><?= strtoupper($value['nama']); ?></td>
                                            <td><?= $value['pangkat']; ?></td>
                                            <td><?= $value['jabatan']; ?></td>
                                            <td><?= $value['email']; ?></td>
                                            <td><?= $value['alamat']; ?></td>
                                    <?php } ?>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane fade show" id="team2" role="tabpanel" aria-labelledby="team2-tab">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                        </tr>
                                        <tr>
                                    <?php $data2 = mysqli_query($conn,"SELECT * FROM user WHERE unit = '$unit' AND nama_team = 'Knights Prime of Power'");
                                    while($value2 = mysqli_fetch_array($data2)){ ?>
                                            <td><?= $value2['nrp']; ?></td>
                                            <td><?= strtoupper($value2['nama']); ?></td>
                                            <td><?= $value2['pangkat']; ?></td>
                                            <td><?= $value2['jabatan']; ?></td>
                                            <td><?= $value2['email']; ?></td>
                                            <td><?= $value2['alamat']; ?></td>
                                    <?php } ?>
                                        </tr>
                                    </table>
                            </div>
                            <div class="tab-pane fade show" id="team3" role="tabpanel" aria-labelledby="team3-tab">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                        </tr>
                                        <tr>
                                        <?php $data3 = mysqli_query($conn,"SELECT * FROM user WHERE unit = '$unit' AND nama_team = 'Eagle Eye Knights'");
                                    while($value3 = mysqli_fetch_array($data3)){ ?>
                                          <td><?= $value3['nrp']; ?></td>
                                            <td><?= strtoupper($value3['nama']); ?></td>
                                            <td><?= $value3['pangkat']; ?></td>
                                            <td><?= $value3['jabatan']; ?></td>
                                            <td><?= $value3['email']; ?></td>
                                            <td><?= $value3['alamat']; ?></td>
                                   <?php } ?>
                                        </tr>
                                    </table>
                            </div>
                            <div class="tab-pane fade show" id="team4" role="tabpanel" aria-labelledby="team4-tab">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                        </tr>
                                        <tr>
                                        <?php $data4 = mysqli_query($conn,"SELECT * FROM user WHERE unit = '$unit' AND nama_team = 'Valkyrie Light'");
                                    while($value4 = mysqli_fetch_array($data4)){ ?>
                                        <td><?= $value4['nrp']; ?></td>
                                            <td><?= strtoupper($value4['nama']); ?></td>
                                            <td><?= $value4['pangkat']; ?></td>
                                            <td><?= $value4['jabatan']; ?></td>
                                            <td><?= $value4['email']; ?></td>
                                            <td><?= $value4['alamat']; ?></td>
                                  <?php } ?>
                                        </tr>
                                    </table>
                            </div>
                            <div class="tab-pane fade show" id="team5" role="tabpanel" aria-labelledby="team5-tab">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                        </tr>
                                        <tr>
                                        <?php $data5 = mysqli_query($conn,"SELECT * FROM user WHERE unit = '$unit' AND nama_team = 'Wild Crime'");
                                    while($value5 = mysqli_fetch_array($data5)){ ?>
                                        <td><?= $value5['nrp']; ?></td>
                                            <td><?= strtoupper($value5['nama']); ?></td>
                                            <td><?= $value5['pangkat']; ?></td>
                                            <td><?= $value5['jabatan']; ?></td>
                                            <td><?= $value5['email']; ?></td>
                                            <td><?= $value5['alamat']; ?></td>
                                  <?php } ?>
                                        </tr>
                                    </table>
                            </div>
                            <div class="tab-pane fade show" id="team6" role="tabpanel" aria-labelledby="team6-tab">
                            <table class="table table-striped">
                                        <tr>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Pangkat</th>
                                            <th>Jabatan</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                        </tr>
                                        <tr>
                                        <?php $data6 = mysqli_query($conn,"SELECT * FROM user WHERE unit = '$unit' AND nama_team = 'Top Thunder Squad'");
                                    while($value6 = mysqli_fetch_array($data6)){ ?>
                                        <td><?= $value6['nrp']; ?></td>
                                            <td><?= strtoupper($value6['nama']); ?></td>
                                            <td><?= $value6['pangkat']; ?></td>
                                            <td><?= $value6['jabatan']; ?></td>
                                            <td><?= $value6['email']; ?></td>
                                            <td><?= $value6['alamat']; ?></td>
                                  <?php } ?>
                                        </tr>
                                    </table>
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