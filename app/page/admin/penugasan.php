<?php
session_start();
error_reporting(0);
include("../../../server/config.php");
if(!isset($_SESSION["nrp"])){
    header("Location:../../authentication/index.php");
}

$alert = "";

$unit = $_SESSION["unit"];

if(isset($_POST["export"])){
    $kasus = $_POST["laporan_kasus_narkotika_nomor"];
    $nama = implode(',',$_POST["nama"]);
    $tgl = date("Y-m-d");
    $tersangka = $_POST["an_tersangka"];
    $kel = $_POST["jenis"];
    $agama = $_POST["agama"];
    $tgl_lahir = $_POST["tgl_lahir"];
    $pend = $_POST["pendidikan"];
    $kerja = $_POST["pekerjaan"];
    $warga = $_POST["warganegara"];
    $alamat = $_POST["alamat"];

    if($kasus==""||$tgl==""||$tersangka==""||$kel==""||$agama==""||$tgl_lahir==""||$pend==""||$kerja==""||$warga==""||$alamat==""){
        $alert = "<script>swal('Peringatan','Field masih ada yang belum di isi','warning')</script>";
    }else{
     mysqli_query($conn,"INSERT INTO surat_tugas (id,nomer_kasus,nama,tanggal,polsek,an_tersangka,jenis_kelamin,tgl_lahir,agama,pendidikan_terakhir,pekerjaan,warganegara,alamat,status_tersangka) VALUES 
                    ('','$kasus','$nama','$tgl','$unit','$tersangka','$kel','$tgl_lahir','$agama','$pend','$kerja','$warga','$alamat','belum tertangkap')");
    $alert = "<script>swal('Sukses','Data berhasil disimpan','success')</script>";
    }
}
?>
<!doctype html>
 <html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA | PENUGASAN</title>
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
                    <h5>Surat Tugas</h5>
                </div>
            </div>

        <div class="row">
          <div class="col-md-12" style="padding-top:10px;">
            <form method="post" action="">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="no_laporan">Laporan Kasus Narkotika Nomor</label>
                        <input type="text" class="form-control" name="laporan_kasus_narkotika_nomor" id="laporan_kasus_narkotika_nomor" autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="no_laporan">Atas Nama Tersangka</label>
                        <input type="text" class="form-control" name="an_tersangka" id="an_tersangka" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jenis_kel">Jenis Kelamin</label>
                        <select class="form-control" name="jenis" id="jenis">
                            <option value="">-</option>
                            <option value="Laki - laki">Laki - laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="kelahiran">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="agama">Agama</label>
                        <select class="form-control" name="agama" id="agama">
                            <option value="">-</option>
                            <option value="Islam">Islam</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Protestan">Protestan</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="warganegara">Warganegara</label>
                        <select class="form-control" name="warganegara" id="warganegara">
                            <option value="">-</option>
                            <option value="wna">WNA</option>
                            <option value="wni">WNI</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pendidikan">Pendidikan</label>
                        <select class="form-control" name="pendidikan" id="pendidikan">
                            <option value="">-</option>
                            <option value="sd">SD</option>
                            <option value="smp">SMP</option>
                            <option value="sma">SMA</option>
                            <option value="d3">D3</option>
                            <option value="s1">S1</option>
                            <option value="s2">S2</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="pekerjaan">Pekerjaan</label>
                        <textarea class="form-control" id="pekerjaan" name="pekerjaan"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="label">DiTugaskan Kepada</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="form-check">
                        <?php $query = mysqli_query($conn,"SELECT * FROM USER WHERE status_user = 'intel' AND unit = '$unit'");
                              foreach ($query as $key => $value) { ?>
                              <div class="row">
                                <div class="col-md-12">
                              <input class="form-check-input" type="checkbox" name="nama[]" value="<?= $value['nama'];?>">
                              <label class="form-check-label" for="gridCheck">
                                <?= $value["nama"]; ?>
                              </label>
                                </div>
                              </div>
                        <?php } ?>
                        </div>
                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <button type="submit" name="export" class="btn btn-primary">Buat Tugas Anggota</button>
                        </div>
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