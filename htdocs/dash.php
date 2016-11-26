<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<html>
    <head>
        <meta lang="en">
        <title>My Dashboard</title>
        <?php require ('headlinks.php'); ?>

    </head>

    <body>
        <?php 
        require ('header.php'); 
        if($_SESSION['userType']== "admin") {
            require ('admindashboard.php');
        }else require ('dashboard.php');
        include ('footer.php');
        
        ?>


    </body>




</html>