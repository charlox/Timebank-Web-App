<?php 
session_start(); 
require ('headlinks.php');
require('conn2d.php');

$_SESSION['activeViewReq'] = $_POST['viewreq'];
$query = "select * from active_requests where request_id='" . $_SESSION["activeViewReq"] . "';";
$result = mysqli_query($conn, $query);

if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $_SESSION['activerequester'] = $row["requester"];
        $_SESSION['activerequestee'] = $row["requested_from_user"];
        $_SESSION['activehours'] = $row['hours_requested'];
        $_SESSION['activedesc'] = $row['req_desc'];
        $_SESSION['activedate'] = $row['work_date'];
    }
}

$query2 = "select email_address from members where member_id='" . $_SESSION["activerequester"] . "';";
$result2 = mysqli_query($conn, $query2);

if ($result2 = $conn->query($query2)) {

    /* fetch associative array */
    while ($row = $result2->fetch_assoc()) {
        $_SESSION['requesteremail'] = $row["email_address"];
    }
}

$query3 = "select email_address from members where member_id='" . $_SESSION["activerequestee"] . "';";
$result3 = mysqli_query($conn, $query3);

if ($result3 = $conn->query($query3)) {

    /* fetch associative array */
    while ($row = $result3->fetch_assoc()) {
        $_SESSION['requesteeemail'] = $row["email_address"];
    }
}

mysqli_close($conn);

?>

<div class="blackout">
    <div class='popoutform' id='reqdetails'>
        <h1>Request Details</h1>

            <p class="viewtitle">Date of Claim:</p> 
        <p class="viewdets"><?php echo $_SESSION['activedate']; ?></p>
        <p class="viewtitle">Details:</p><p class="viewdets"> <?php echo $_SESSION['activedesc']; ?></p>
            <p class="viewtitle">Requester:</p> <p class="viewdets">User
                <?php echo $_SESSION['activerequester'] . "<br>(" . $_SESSION['requesteremail'] . ")"; ?></p>
            <p class="viewtitle">From:</p><p class="viewdets">User
                <?php echo $_SESSION['activerequestee'] . "<br>(" . $_SESSION['requesteeemail'] . ")"; ?></p>
            <p class="viewtitle">Duration (hours):</p> 
        <p class="viewdets"><?php echo $_SESSION['activehours']; ?></p>
        <form id="decline" action='decline.php' method='post' class='multibutton'>
            <button type="submit" class="button blue2 multibutton">Decline</button>
        </form>
        <button onclick='window.history.back();' class="button blue2 multibutton">Close</button>
        <form id="accept" action='accept.php' method='post' class='multibutton'>
        <button type="submit" class="button blue2 multibutton">Accept</button>
        </form>
    </div>
</div>








<?php require('admindash.php'); ?>