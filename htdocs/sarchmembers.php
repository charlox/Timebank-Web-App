<?php
session_start();

$crit = $_GET['membersearch'];
$_SESSION['memsearchcriteria'] = $crit;



header('location:dash.php');




?>