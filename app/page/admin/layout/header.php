<?php 
include("../../../server/config.php");
$nrp = $_SESSION["nrp"];
$user = mysqli_query($conn,"SELECT foto FROM user WHERE nrp = '$nrp'");
$data = mysqli_fetch_array($user);
?>
<header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php"><img src="../../../asset/logo.png" alt="Logo" style="width:40px; height:40px; margin-right:20px;">SAT RESNARKOBA</a>
                    <a class="navbar-brand hidden" href="./"><img src="../../../asset/logo.png" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                
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