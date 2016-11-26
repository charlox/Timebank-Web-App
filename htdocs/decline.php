<?php
session_start();
require ('conn2d.php');

if(!$conn) {

    $_SESSION['resulterror'] = "Unable to save, please try later.";
    header('location:blackerror.php');

}

$query = "update active_requests set status='closed' where request_ID='" . $_SESSION['activeViewReq'] . "';";
$send = mysqli_query($conn, $query);


$_SESSION['resulterror'] = "Successfully declined.";
header('location:blackerror.php');
?>