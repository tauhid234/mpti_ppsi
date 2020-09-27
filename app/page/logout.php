<?php 
session_start();
session_unset($_SESSION["nrp"]);
session_destroy();
header("location:../authentication/index.php");