<?php session_start(); ?>

<div id="blackout3" class="blackout">
    <div id="errorbox" class="popoutform">
        <h1 style="margin-top:20px;"><?php echo $_SESSION['resulterror']; ?></h1>
        <button onclick='window.history.back();' type="reset" class="button blue2 multibutton">Back</button>
        <a href="dash.php" class="button blue3 multibutton">My Dash</a>
    </div>

</div>

<?php 
require ('dash.php');
?>