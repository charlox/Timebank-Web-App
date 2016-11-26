<?php
session_start();

require ('conn2d.php');

if(!$conn) {
    $_SESSION["loginErrorMsg"] = mysqli_connect_error();
    header("location:index.php");

}

$email = $_POST['loginemail'];
$pw = $_POST['loginpw'];

$sqlquery = "select * from members where email_address='$email' and password='$pw';";
$adminq = "select * from admins where email_address='$email' and password='$pw';";
$result = mysqli_query($conn, $sqlquery);
$admresult = mysqli_query($conn, $adminq);
$match = mysqli_num_rows($result);
$admmat = mysqli_num_rows($admresult);


if($match >0 ) {

    if ($result = $conn->query($sqlquery)) {

        /* fetch associative array */
        while ($row = $result->fetch_assoc()) {
            $_SESSION['name'] = $row["forename"];
            $_SESSION['surname'] = $row["surname"];
            $_SESSION['currentUserID'] = $row['member_id'];
            $_SESSION['userType'] = "user";
        }
    }
    header("location:dash.php");

} else if ($admmat >0 ) {

    if ($admresult = $conn->query($adminq)) {

        /* fetch associative array */
        while ($row = $admresult->fetch_assoc()) {
            $_SESSION['name'] = $row["forename"];
            $_SESSION['surname'] = $row["surname"];
            $_SESSION['currentUserID'] = $row['admin_id'];
            $_SESSION['userType'] = "admin";
        }
    }
    header("location:admindash.php");

}


else {
    $_SESSION['loginErrorMsg'] = "Invalid username/password";
    header("location:index.php");
}

mysqli_close($conn);

?>