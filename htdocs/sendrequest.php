<?php
session_start();
require ('conn2d.php');

if(!$conn) {

    $_SESSION['resulterror'] = "Unable to connect, please try later.";
        header('location:blackerror.php');

}

$submitter = $_SESSION['currentUserID'];
$fromuser = $_POST['newreqfrom'];
$hours = $_POST['newreqdur'];
$dets = $_POST['newreqdesc'];
$date = $_POST['newreqdate'];



$query = "select * from members where email_address='$fromuser' or password='$fromuser';";
$result = mysqli_query($conn, $query);
$match = mysqli_num_rows($result);

if($match >0) {
    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $requestee = $row["member_id"];
            $input = "insert into active_requests
            (requester, requested_from_user, hours_requested, req_desc, work_date, sent_to, status)
            values ('" . $submitter . "', '" . $requestee . "', '" . $hours . 
                "', '" . $dets . "', '" . $date . "', 'admin', 'active');";
            $send = mysqli_query($conn, $input);
            $_SESSION['resulterror'] = "Request submitted.";

        }
    }
} else {
    
    $_SESSION['resulterror'] = "No matching users found. Please verify details and try again.";

}

header('location:blackerror.php');

mysqli_close($conn);


?>