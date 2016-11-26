<?php
session_start();
?>

<html>
    <head>
        <meta lang="en">
        <title>TimeBank Home</title>
        <?php require ('headlinks.php'); ?>

    </head>

    <body>
        <?php require ('header.php'); 
        
        #If User is logged in, redirect to dash
        if(isset($_SESSION['userType'])){
        if($_SESSION['userType'] == "admin") {
            if(isset($_SESSION['errorMessage']))
            header("location:admindash.php");
        } else if($_SESSION['userType'] == "user") {
           header("location:dash.php"); 
        }
        }
        
        else {
        include ('login.php');
        }





        include ('footer.php'); ?>
    </body>




</html>