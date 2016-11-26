<?php
session_start();
require ('conn2d.php');

if(!$conn) {

    $_SESSION['resulterror'] = "Unable to connect, please try later.";
        header('location:blackerror.php');

}

$submitter = $_SESSION['currentUserID'];
$title = $_POST['newadtitle'];
$desc = $_POST['newaddesc'];
$cont = $_POST['newadcontact'];
$loc = $_POST['newadloc'];
$dur = $_POST['newaddur'];
$date=getdate();
$posteddate = $date[mday] . "/" . $date[mon] . "/" . $date[year];

if($_SESSION['hoursBal'] <= -10) {
    $_SESSION['resulterror'] = "Not enough credit to request assistance.";
} else {
    $input = "insert into adverts
            (owner_id, date_posted, advert_title, details, contact_details, location, duration_estimate)
            values ('" . $submitter . "', '" . $posteddate . "', '" . $title . "', '" . $desc . 
                "', '" . $cont . "', '" . $loc . "', '" . $dur . "');" ;
            $send = mysqli_query($conn, $input);
            $_SESSION['resulterror'] = "Advert posted.";
}

header('location:blackerror.php');

?>