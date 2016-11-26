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
        <?php require ('header.php'); ?>
        <?php require('admindashboard.php');?>



        <?php include ('footer.php'); ?>
    </body>




</html>