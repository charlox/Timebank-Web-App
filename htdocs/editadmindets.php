<?php 
session_start();
if(isset($_SESSION['activeViewUser'])) {
    unset($_SESSION['activeViewUser']);
}
require ('headlinks.php');
require('conn2d.php');
$query = "select * from admins where admin_id='" . $_SESSION["currentUserID"] . "';";
$result = mysqli_query($conn, $query);
if ($result = $conn->query($query)) {
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $_SESSION['name'] = $row["forename"];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['email'] = $row['email_address'];
        $_SESSION['phoneno'] = $row['phone_number'];
    }
}
mysqli_close($conn);
?>

<!--SORRY ABOUT THE BUNCHED UP HTML, PHP WAS ADDING WHITESPACE-->
<div class="blackout"><div class='popoutform' id='perdetailsadmin'><h1>Edit My Details</h1><form id="perdetailsadmin" action=saveperdets.php method='post'><label>Forename</label><br><input type="text" name="adeditforename" value="<?php echo trim($_SESSION['name']); ?>" required><br><label>Surname</label><br><input type="text" name="adeditsurname" value="<?php echo $_SESSION['surname']; ?>" required><br><label>Email Address</label><br><input type="text" name="adeditemail" value="<?php echo $_SESSION['email']; ?>" required><br><label>Phone number</label><br> <input type="text" name="adeditphone" value="<?php echo $_SESSION['phoneno']; ?>">
    <br>
            <div id="perdetsbuttons">
                <button onclick='window.history.back();' class="button blue2 multibutton">Cancel</button>
                <button type="submit" class="button blue3 multibutton">Save</button>
            </div>
        </form>
    </div>
</div>








<?php require('admindash.php'); ?>