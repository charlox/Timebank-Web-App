<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require ('conn2d.php');
if(!$conn) {

    $_SESSION['resulterror'] = "Unable to connect, please try later.";
        header('location:blackerror.php');

}

$query = "delete from adverts where advert_id='" . $_SESSION['activeAd'] . "';";
$result = mysqli_query($conn, $query);

$_SESSION['resulterror'] = "Advert deleted.";
        header('location:deleteconf.php');


?>