<?php 
session_start(); 
require ('headlinks.php');
require('conn2d.php');
$query = "select * from members where member_id='" . $_SESSION["currentUserID"] . "';";
if($_SESSION['userType'] == 'admin') {
    $activeUser = $_POST['mem_det'];
    $_SESSION['activeViewUser'] = $activeUser;
    $query =  "select * from members where member_id='" . $activeUser . "';";
}
$result = mysqli_query($conn, $query);
if ($result = $conn->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $_SESSION['name'] = $row["forename"];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['dob'] = $row['dob'];
        $_SESSION['email'] = $row['email_address'];
        $_SESSION['phoneno'] = $row['phone_number'];
    }
}
mysqli_close($conn);
?>
<script type="text/javascript">
    function switchPerButtons() {
        if(document.getElementById('perdetsbuttons').style.display != "none") {
            document.getElementById('delaccconf').style.display = "inline-block";
            document.getElementById('perdetsbuttons').style.display = "none";
        } else {
            document.getElementById('delaccconf').style.display = "none";
            document.getElementById('perdetsbuttons').style.display = "inline-block";
        }
    }
</script>

<!--SORRY ABOUT THE BUNCHED UP HTML, PHP WAS ADDING WHITESPACE-->
<div class="blackout"><div class='popoutform' id='perdetails'><h1>Edit My Details</h1><form id="perdetails" action=saveperdets.php method='post'><label>Forename</label><br><input type="text" name="editforename" value="<?php echo trim($_SESSION['name']); ?>" required><br><label>Surname</label><br><input type="text" name="editsurname" value="<?php echo $_SESSION['surname']; ?>" required><br><label>Date of Birth</label><br> <input type="text" name="editdob" value="<?php echo $_SESSION['dob']; ?>" required><br><label>Email Address</label><br><input type="text" name="editemail" value="<?php echo $_SESSION['email']; ?>" required><br><label>Phone number</label><br> <input type="text" name="editphone" value="<?php echo $_SESSION['phoneno']; ?>">
    <br>
    <div id="perdetsbuttons">
        <button onclick="window.history.back()" class="button blue2 multibutton">Cancel</button>
        <button type="submit" class="button blue3 multibutton">Save</button>
        <?php if($_SESSION['userType'] == "user") echo
        '<a class="button blue2 multibutton" onclick="switchPerButtons()">Delete Account</a>';
        ?>
    </div>
    </form>
    <div id="delaccconf" style="display:none;">
        <form id="deleteaccconfirm" action='deleteaccount.php'>
            <label>Really delete account?</label><br>
            <a class="button blue2 multibutton" onclick="switchPerButtons()">No</a>
            <button type="submit" class="button blue3 multibutton">Yes</button>
        </form>
    </div>
    </div>
</div>








<?php require('dash.php'); ?>