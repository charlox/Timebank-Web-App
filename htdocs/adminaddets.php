<?php 
session_start(); 
require ('headlinks.php');
require('conn2d.php');

$_SESSION['activeAd'] = $_POST['advert'];
$query = "select * from adverts where advert_id='" . $_SESSION["activeAd"] . "';";
$result = mysqli_query($conn, $query);

if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $_SESSION['activeTitle'] = $row["advert_title"];
        $_SESSION['activeDetails'] = $row['details'];
        $_SESSION['activeContact'] = $row['contact_details'];
        $_SESSION['activeLoc'] = $row['location'];
        $_SESSION['activeDur'] = $row['duration_estimate'];
    }
}
mysqli_close($conn);

?>
<script type="text/javascript">

function switchButtonsAdm() {
    if(document.getElementById('origbuttonsAdm').style.display != "none") {
        document.getElementById('delconfAdm').style.display = "inline-block";
        document.getElementById('origbuttonsAdm').style.display = "none";
        } else {
        document.getElementById('delconfAdm').style.display = "none";
        document.getElementById('origbuttonsAdm').style.display = "inline-block";
        }
}
</script>

<!--SORRY ABOUT THE BUNCHED UP HTML, PHP ECHO WAS ADDING WHITESPACE-->
<div class="blackout"><div class='popoutform' id='addetails'><h1> Advert Details</h1><form id="addetails" action=savead.php method='post'><label>Title:</label><br> <input type="text" name="editadtitleadm" value="<?php echo $_SESSION['activeTitle']; ?>" required><br><label>Details:</label><br><textarea cols="40" rows="5" name="editaddescadm" value="<?php echo $_SESSION['activeDetails']; ?>" required><?php echo $_SESSION['activeDetails']; ?></textarea><br><label>Contact:</label><br> <input type="text" name="editadcontactadm" value="<?php echo $_SESSION['activeContact']; ?>" required><br><label>Location:</label><br> <input type="text" name="editadlocadm" value="<?php echo $_SESSION['activeLoc']; ?>" required><br><label>Duration (hours):</label><br> <input type="text" name="editadduradm" value="<?php echo $_SESSION['activeDur']; ?>" required>
            <br>

            <div id="origbuttonsAdm">
                <button onclick='window.history.back();' class="button blue2 multibutton">Cancel</button>
                <button type="submit" class="button blue3 multibutton">Save</button>
                <a class="button blue2 multibutton" onclick="switchButtonsAdm()">Delete</a>
            </div>
        </form>
        <div id="delconfAdm" style="display:none;">
            <form id="deleteconfirm" action='deleteentry.php'>
                <label>Really delete this ad?</label><br>
                <a class="button blue2 multibutton" onclick="switchButtonsAdm()">No</a>
                <button type="submit" class="button blue3 multibutton">Yes</button>
            </form>
        </div>
    </div>
</div>








<?php require('admindash.php'); ?>