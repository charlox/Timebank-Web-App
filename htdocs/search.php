<?php
session_start();

if($_SESSION['userType'] == "user"){
$crit = $_GET['typesearch'];
$_SESSION['searchcriteria'] = $crit;
} else if ($_SESSION['userType'] == "admin") {
    $crit = $_GET['adsearch'];
    $_SESSION['searchcriteria'] = $crit;
}



header('location:dash.php');




?>