<?php 
include("../../../server/config.php");
$nrp = $_SESSION["nrp"];
$unit = $_SESSION['unit'];
$team = $_SESSION["nama_team"];
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
                        $count = mysqli_query($conn,"SELECT * FROM surat_tugas WHERE polsek = '$unit' AND nama_team = '$team' AND status_tersangka = 'belum tertangkap'");
                        $data_count = mysqli_num_rows($count);
                        $data_trs = mysqli_fetch_array($count); 
                        ?>
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle text-white" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"><?= $data_count; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">Notifikasi Tugas</p>
                                        <?php if($data_count > 0){?>
                                            <a class="dropdown-item media" href="#">
                                            <span class="photo media-left"><img alt="avatar" src="../../../image/<?= $data_trs['foto_tersangka'];?>"></span>
                                            <div class="message media-body">
                                            <span class="name float-left">Tugas Penyelidikan untuk <?= $data_trs['an_tersangka']; ?></span>
                                            </div>
                                        </a>
                                        <?php }else{}?>
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