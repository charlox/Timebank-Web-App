<?php 
session_start(); 
require ('headlinks.php');
require('conn2d.php');

$_SESSION['activeViewAd'] = $_POST['viewadvert'];
$query = "select * from adverts where advert_id='" . $_SESSION["activeViewAd"] . "';";
$result = mysqli_query($conn, $query);

if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $_SESSION['activeVTitle'] = $row["advert_title"];
        $_SESSION['activeVdate'] = $row["date_posted"];
        $_SESSION['activeVDetails'] = $row['details'];
        $_SESSION['activeVContact'] = $row['contact_details'];
        $_SESSION['activeVLoc'] = $row['location'];
        $_SESSION['activeVDur'] = $row['duration_estimate'];
    }
}
mysqli_close($conn);

?>

<div class="blackout">
    <div class='popoutform' id='adVdetails'>
        <h1> Advert Details</h1>

            <p class="viewtitle">Title:</p><p class="viewdets">
                <?php echo $_SESSION['activeVTitle']; ?>
        </p>
        <p class="viewtitle">Details:</p><p class="viewdets"> <?php echo $_SESSION['activeVDetails']; ?></p>
            <p class="viewtitle">Contact:</p> <p class="viewdets">
                <?php echo $_SESSION['activeVContact']; ?></p>
            <p class="viewtitle">Location:</p><p class="viewdets">
                <?php echo $_SESSION['activeVLoc']; ?></p>
            <p class="viewtitle">Duration (hours):</p> 
        <p class="viewdets"><?php echo $_SESSION['activeVDur']; ?></p>
<p class="viewtitle">Posted:</p> 
        <p class="viewdets"><?php echo $_SESSION['activeVdate']; ?></p>

                <button onclick="window.history.back();" class="button blue2 multibutton">Close</button>
    </div>
</div>








<?php 
if($_SESSION['userType'] == "admin") {
            require ('admindash.php');
        } else require ('dash.php');
?>