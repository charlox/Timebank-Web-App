<?php
session_start();
require ('conn2d.php');

if(!$conn) {

    $_SESSION['resulterror'] = "Unable to save, please try later.";
    header('location:blackerror.php');

}

if($_SESSION['userType'] == "user" || isset($_SESSION['activeViewUser'])) {
$submitter = $_SESSION['currentUserID'];
    if($_SESSION['userType'] == "admin") {
        $submitter = $_SESSION['activeViewUser'];
    }
$forename = $_POST['editforename'];
$surname = $_POST['editsurname'];
$dob = $_POST['editdob'];
$email = $_POST['editemail'];
$phone = $_POST['editphone'];

    $input = "update members
            set forename='" . $forename . 
        "', surname='" . $surname . 
        "', dob='" . $dob . 
        "', email_address='" . $email . 
        "', phone_number='" . $phone . "'
        where member_id='" . $submitter . "';";
    $send = mysqli_query($conn, $input);
}
else if ($_SESSION['userType'] == "admin") {
    $submitter = $_SESSION['currentUserID'];
$forename = $_POST['adeditforename'];
$surname = $_POST['adeditsurname'];
$email = $_POST['adeditemail'];
$phone = $_POST['adeditphone'];
    
    $input = "update admins
            set forename='" . $forename . 
        "', surname='" . $surname .  
        "', email_address='" . $email . 
        "', phone_number='" . $phone . "'
        where admin_id='" . $submitter . "';";
    $send = mysqli_query($conn, $input);
    
}
    $_SESSION['resulterror'] = "Personal details updated.";

header('location:deleteconf.php');

?>