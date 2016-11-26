<?php session_start(); 
require('conn2d.php');
require('headlinks.php');
if(!$conn) {

    $_SESSION['resulterror'] = "Unable to delete, please try later.";
    header('location:blackerror.php');

}

$member = $_SESSION['currentUserID'];
if($_SESSION['userType'] == "admin") {
    $member = $_SESSION['activeViewUser'];
}

$input = "delete from members where member_id='" . $member . "';";
$send = mysqli_query($conn, $input);
echo $input;
$input = "delete from adverts where owner_id='" . $member . "';";
$send = mysqli_query($conn, $input);
echo $input;
$input = "delete from active_requests where requester='" . $member . "';";
$send = mysqli_query($conn, $input);
echo $input;

    mysqli_close($conn);

if($_SESSION['userType'] == "user") {
    session_unset();
    session_destroy();
    session_write_close();
    session_regenerate_id(true);
}
?>

<div id="blackout3" class="blackout">
    <div id="delbox" class="popoutform">
        <h1 style="margin-top:20px;">If you have no outstanding requests or claims, account has been deleted.<br>Else contact admin for support.</h1>
        <a href="index.php" class="button blue3 multibutton">OK</a>
    </div>

</div>

<?php require ('index.php'); ?>