<?php
session_start();

require ('conn2d.php');

if(!$conn) {
    $_SESSION["errorMessage"] = mysqli_connect_error();
    header("location:signup.php");

}

$_SESSION['name'] = $_POST['newname'];
$name = $_POST['newname'];
$surname = $_POST['newsurname'];
$bd = $_POST['newbd'];
$email = $_POST['newemail'];
$pw = $_POST['newpw'];
$pwcon = $_POST['newpwconf'];
$phone = $_POST['newtel'];


$sqlquery = "select * from members where email_address='$email';";
$result = mysqli_query($conn, $sqlquery);
$match = mysqli_num_rows($result);


if($pw != $pwcon) {
    $_SESSION["errorMessage"] = "Passwords do not match";
    header("location:signup.php");
} 
else if (strlen($pw) < 8) {
    $_SESSION["errorMessage"] = "Password must be at least 8 characters long";
    header("location:signup.php");
} 
else if ($match>0) {
    $_SESSION["errorMessage"] = "Email address already registered";
    header("location:signup.php");
}

#If all criteria met
else {
    $_SESSION["errorMessage"] = "";
    $inputdet = "insert into members (forename, surname, dob, email_address, password, phone_number) 
values ('$name', '$surname', '$bd', '$email', '$pw', '$phone');";
    $result = mysqli_query($conn, $inputdet);
    header("location:welcome.php");
} ;

mysqli_close($conn);

?>