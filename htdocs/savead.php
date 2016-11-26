<?php
session_start();
require ('conn2d.php');

if(!$conn) {

    $_SESSION['resulterror'] = "Unable to save, please try later.";
    header('location:blackerror.php');

}
if($_SESSION['userType'] == "user") {
$adtitle = $_POST['editadtitle'];
$desc = $_POST['editaddesc'];
$cont = $_POST['editadcontact'];
$loc = $_POST['editadloc'];
$dur = $_POST['editaddur'];

    $input = "update adverts
            set advert_title='" . $adtitle . 
        "', details='" . $desc . 
        "', contact_details='" . $cont . 
        "', location='" . $loc . 
        "', duration_estimate='" . $dur . "'
        where advert_id='" . $_SESSION['activeAd'] . "';";
    $send = mysqli_query($conn, $input);
} else if ($_SESSION['userType'] == "admin"){
    $adtitle = $_POST['editadtitleadm'];
$desc = $_POST['editaddescadm'];
$cont = $_POST['editadcontactadm'];
$loc = $_POST['editadlocadm'];
$dur = $_POST['editadduradm'];

    $input = "update adverts
            set advert_title='" . $adtitle . 
        "', details='" . $desc . 
        "', contact_details='" . $cont . 
        "', location='" . $loc . 
        "', duration_estimate='" . $dur . "'
        where advert_id='" . $_SESSION['activeAd'] . "';";
    $send = mysqli_query($conn, $input);
    
} 
   $_SESSION['resulterror'] = "Advert updated.";

header('location:deleteconf.php');

?>