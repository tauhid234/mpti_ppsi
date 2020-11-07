<?php 
include("../../../server/config.php");
$nrp = $_SESSION["nrp"];
$user = mysqli_query($conn,"SELECT foto FROM user WHERE nrp = '$nrp'");
$data = mysqli_fetch_array($user);
?>
<header id="header" class="header bg-primary">
            <div class="top-left bg-primary">
                <div class="navbar-header bg-primary">
                    <a class="navbar-brand text-white" href="dashboard.php"><img src="../../../asset/logo.png" alt="Logo" style="width:40px; height:40px; margin-right:20px;">SAT RESNARKOBA</a>
                    <a class="navbar-brand hidden" href="./"><img src="../../../asset/logo.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars text-white"></i></a>
                </div>
            </div>
            <div class="top-right bg-primary">
                <div class="header-menu bg-primary">
                    <div class="header-left">
                        

                    <?php 
                        $count = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE polsek = '$unit' AND status_tersangka = 'belum tertangkap'");
                        $data_count = mysqli_num_rows($count);
                        // $data_trs = mysqli_fetch_array($count); 
                        ?>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle text-white" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?= $data_count; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">Notifikasi</p>
                                    <?php foreach($count as $key => $value){ ?>
                                <a class="dropdown-item media">
                                    <div class="message media-body">
                                    <span class="photo media-left"><img alt="avatar" src="../../../image/mysterius.png"></span>
                                        <span class="name float-left"><?= "Team ".$value["nama_team"]?> <br> sedang melakukan penyidikan terhadap tersangka <br><strong><?= strtoupper($value['an_tersangka']); ?></strong><br>
                                        <span class="badge badge-danger">Status <?= $value["status_tersangka"];?></span></span>
                                        </div>
                                </a>
                                    <?php } ?>
                            </div>
                        </div>

                       
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../../../image/<?= $data['foto'];?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="profile.php"><i class="fa fa-user"></i>Profil</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Keluar</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>