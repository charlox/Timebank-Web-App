<?php session_start(); ?>

<div id="blackout3" class="blackout">
    <div id="delbox" class="popoutform">
        <h1 style="margin-top:20px;"><?php echo $_SESSION['resulterror']; ?></h1>
        <a href="<?php
                 if($_SESSION['userType'] == "admin") {
                     echo "admindash.php";
                 } else echo "dash.php";?>" class="button blue3 multibutton">My Dash</a>
    </div>

</div>

<?php 
if($_SESSION['userType'] == "admin") {
    require ('admindash.php');
} else require ('dash.php');
?>