<?php 
session_start();
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}

$unit = $_SESSION["unit"];
$team = $_SESSION["nama_team"];

$alert = "";
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | LAPORAN AWAL</title>
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
                    <?php 
                    $queryCek = mysqli_query($conn,"SELECT * FROM laporan WHERE nama_team = '$team' AND unit = '$unit' AND proses_laporan = ''");
                    $cekrow = mysqli_num_rows($queryCek);
                    if($cekrow==1){ ?>
                    <p><a href="input_laporan_awal.php" class="btn btn-primary">Input laporan awal</a></p>
                    <?php }else{} ?>
                    <h5 class="mb-4">Laporan Awal</h5>
                </div>
            </div>

            <div class="row">
            <?php 
            $query = mysqli_query($conn,"SELECT laporan.*, surat_tugas.an_tersangka,surat_tugas.jenis_kelamin,surat_tugas.tgl_lahir,surat_tugas.agama,surat_tugas.pendidikan_terakhir,surat_tugas.pekerjaan,surat_tugas.warganegara,surat_tugas.alamat FROM laporan,surat_tugas WHERE laporan.status_laporan = 'awal' AND surat_tugas.nama_team = '$team' AND laporan.nama_team = '$team' AND laporan.unit = '$unit' AND laporan.nomer_kasus = surat_tugas.nomer_kasus");
            foreach ($query as $q => $value) {
            ?>
                <div class="col-md-6">
                    <div class="card">
                        <iframe
                            width="100%"
                            height="200"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/view?key=AIzaSyBYHSJymZYnSTdi3vH4Mh_H7b-jAgBOCag&center=<?= $value['latitude'];?>,<?=  $value['longtitude'];?>&zoom=18&maptype=satellite" allowfullscreen>
                            </iframe>
                            <iframe
                            width="100%"
                            height="200"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBYHSJymZYnSTdi3vH4Mh_H7b-jAgBOCag
                                &q=<?= $value['latitude'];?>,<?=  $value['longtitude'];?>" allowfullscreen>
                            </iframe>
                        <div class="card-body">

                        <?php 
                        if($value['proses_laporan']==""){?>
                        <span class="badge badge-info">Menunggu Keberlanjutan Laporan</span><br><br>
                        <?php }elseif($value['proses_laporan']=="tidak lanjut"){ ?>
                        <span class="badge badge-danger">Laporan Tidak di lanjutkan</span><br><br>
                        <?php }elseif($value['proses_laporan']=="proses" || $value['proses_laporan']=="diproses"){ ?>
                        <span class="badge badge-primary">Laporan di lanjutkan</span><br><br>
                        <?php }elseif($value['proses_laporan']=="selesai"){ ?>
                        <span class="badge badge-success">Laporan telah selesai</span><br><br>
                        <?php } ?>
                            <br><br><i class="menu-icon fa fa-map-marker"></i> <?= $value['unit'];?>
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nomer Kasus : <?= $value['nomer_kasus']; ?></li>
                                <li class="list-group-item">Ditugaskan : <?= $value['nama_team']; ?></li>
                                <li class="list-group-item">Keterangan : <?= $value['keterangan']; ?></li>
                                <li class="list-group-item"><?= $value['tanggal']; ?></li>
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
                                        <img src="../../../image/<?= $value['foto_lokasi'];?>" style="width:100%;height:200px">
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
                                    &location=<?= $value['latitude'];?>,<?=  $value['longtitude'];?>&heading=210&pitch=10&fov=35" allowfullscreen>
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
                                        <h5 class="modal-title" id="<?= $value['id'];?>">Detail Laporan Awal</h5>
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