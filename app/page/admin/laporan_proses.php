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
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | LAPORAN PROSES</title>
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
        <?= $alert; ?>
        <div class="content">
         <!-- Animated -->
         <div class="animated fadeIn">

            <div class="row" style="padding-bottom:10px;">
                <div class="col-md-6">
                    <h5 class="mb-4">Laporan Proses</h5>
                    <a href="cetak/laporan_proses.php"><button type="button" class="btn btn-primary">Cetak</button></a>
                </div>
            </div>

            <div class="row">
            <?php 
            $query = mysqli_query($conn,"SELECT laporan_proses.*, laporan.latitude, laporan.longtitude, surat_tugas.tanggal, surat_tugas.an_tersangka,surat_tugas.jenis_kelamin,surat_tugas.tgl_lahir,surat_tugas.agama,surat_tugas.pendidikan_terakhir,surat_tugas.pekerjaan,surat_tugas.warganegara,surat_tugas.alamat FROM laporan_proses,surat_tugas,laporan WHERE laporan_proses.unit = '$unit' AND laporan_proses.nomer_kasus = surat_tugas.nomer_kasus AND laporan_proses.nomer_kasus = laporan.nomer_kasus");
            foreach ($query as $q => $value) {
            ?>
                <div class="col-md-6">
                    <div class="card">
                            <iframe
                            width="100%"
                            height="200"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/directions?key=AIzaSyBYHSJymZYnSTdi3vH4Mh_H7b-jAgBOCag
                                 &origin=<?= $value['latitude'];?>,<?=  $value['longtitude'];?>&destination=<?= $value['latitude_proses'];?>,<?=  $value['longtitude_proses'];?>&avoid=tolls|highways" allowfullscreen>
                            </iframe>
                            <iframe
                            width="100%"
                            height="200"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBYHSJymZYnSTdi3vH4Mh_H7b-jAgBOCag
                                &q=<?= $value['latitude_proses'];?>,<?=  $value['longtitude_proses'];?>" allowfullscreen>
                            </iframe>
                        <div class="card-body">

                        <?php if($value['status_laporan']=="sudah selesai"){?>
                        <span class="badge badge-success">Laporan telah selesai</span><br><br>
                        <?php }else{}?>

                            <br><br><i class="menu-icon fa fa-map-marker"></i> <?= $value['unit'];?>
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nomer Kasus : <?= $value['nomer_kasus']; ?></li>
                                <li class="list-group-item">Ditugaskan : <?= $value['nama_team']; ?></li>
                                <li class="list-group-item">Keterangan : <?= $value['keterangan_proses']; ?></li>
                                <li class="list-group-item"><?= $value['tanggal_proses']; ?></li>
                                </ul>

                                <div class="card-footer">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#foto<?= $value['id'];?>">
                                Foto Lokasi
                                </button>

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#view<?= $value['id'];?>">
                                Street View
                                </button>

                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detail<?= $value['id'];?>">
                                Detail
                                </button>
                            </div>

                                <!-- Modal -->
                                <div class="modal fade" id="foto<?= $value['id'];?>" tabindex="-1" aria-labelledby="<?= $value['id'];?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?= $value['id'];?>">Foto Lokasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="../../../image/<?= $value['foto_lokasi_proses'];?>" style="width:100%;height:200px">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                 <!-- Modal -->
                                 <div class="modal fade" id="view<?= $value['id'];?>" tabindex="-1" aria-labelledby="<?= $value['id'];?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?= $value['id'];?>">Street View</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <iframe
                                    width="100%"
                                    height="200"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/streetview?key=AIzaSyBYHSJymZYnSTdi3vH4Mh_H7b-jAgBOCag
                                    &location=<?= $value['latitude_proses'];?>,<?=  $value['longtitude_proses'];?>&heading=210&pitch=10&fov=35" allowfullscreen>
                                    </iframe>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="detail<?= $value['id'];?>" tabindex="-1" aria-labelledby="<?= $value['id'];?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="<?= $value['id'];?>">Detail Laporan Proses</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <strong>Alamat Tersangka</strong>
                                    <iframe
                                    width="100%"
                                    height="200"
                                    frameborder="0" style="border:0"
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBYHSJymZYnSTdi3vH4Mh_H7b-jAgBOCag
                                        &q=<?= str_replace('','+',$value['alamat']);?>" allowfullscreen>
                                    </iframe>
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Nama Tersangka : <?= $value['an_tersangka']; ?></li>
                                    <li class="list-group-item">Jenis Kelamin : <?= $value['jenis_kelamin']; ?></li>
                                    <li class="list-group-item">Pendidikan Terakhir : <?= $value['pendidikan_terakhir']; ?></li>
                                    <li class="list-group-item">Agama : <?= $value['agama']; ?></li>
                                    <li class="list-group-item">Pekerjaan : <?= $value['pekerjaan']; ?></li>
                                    <li class="list-group-item">Warganegara : <?= $value['warganegara']; ?></li>
                                    <li class="list-group-item">Tanggal Penugasan : <?= $value['tanggal']; ?></li>
                                    </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                
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
    <script src="../../../asset/js/main.js"></script>

    <!--Local Stuff-->
  
    
</body>
</html>