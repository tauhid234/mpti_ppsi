<?php 
session_start();
include("../../server/config.php");
if(isset($_SESSION["nrp"])){
    header("Location:../authentication/index.php");
}

$isInvalid = "";
$alert = "";
if(isset($_POST["submit"])){
    $nrp = $_POST["nrp"];
    $pass = $_POST["password"];

    if($nrp==""){
        $isInvalid = "is-invalid";
    }elseif($pass==""){
        $isInvalid = "is-invalid";
    }else{

    $query = mysqli_query($conn,"SELECT * FROM user WHERE nrp = '$nrp'");
    if(mysqli_num_rows($query)==1){
        $row = mysqli_fetch_assoc($query);
        if(password_verify($pass,$row["password"])){
        $_SESSION["nrp"] = $nrp;
        $_SESSION["status_user"] = $data["status_user"];
        echo "Berhasil Login";
        header("location:../page/dashboard.php");
        }
    }
       $alert = "<script>swal('Gagal', 'NRP atau password Anda salah', 'error');</script>";
    
}
}

?>


<!doctype html>
<html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAT RESNARKOBA</title>
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
    <!--SWEET ALERT-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <?= $alert; ?>
                <div class="login-form">
                    <form method="post" action="">
                        <div class="form-group">
                            <label>NRP</label>
                            <input type="text" name="nrp" class="form-control <?=$isInvalid;?>" id="nrp" autocomplete="off">
                            
                            <div class="invalid-feedback" id="invalid-feedback">
                                Mohon isi NRP
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control <?=$isInvalid;?>" id="password">

                            <div class="invalid-feedback" id="invalid-feedback">
                                Password belum di isi
                            </div>

                        </div>
                        <button type="submit" name="submit" class="btn btn-info btn-flat m-b-30 m-t-30">MASUK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../../asset/js/main.js"></script>

    <script src="../../main/validate.js"></script>

</body>
</html>
