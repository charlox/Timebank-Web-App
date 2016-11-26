<?php
session_start();
require ('conn2d.php');

if(!$conn) {

    $_SESSION['resulterror'] = "Unable to save, please try later.";
    header('location:blackerror.php');

}

$query = "update members set hour_balance=hour_balance+" . (int)$_SESSION["activehours"] . " 
where member_id='" . $_SESSION['activerequester'] . "';";
$send = mysqli_query($conn, $query);
$query2 = "update members set hour_balance=hour_balance-" . (int)$_SESSION["activehours"] . " 
where member_id='" . $_SESSION['activerequestee'] . "';";
$send = mysqli_query($conn, $query2);
$query = "delete from active_requests where request_ID='" . $_SESSION['activeViewReq'] . "';";
$send = mysqli_query($conn, $query);


$_SESSION['resulterror'] = "Successfully updated.";
header('location:blackerror.php');
?>