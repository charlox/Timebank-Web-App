<?php
session_start();
$username = $_SESSION['name'];
?>

<html>
    <head>
        <meta lang="en">
        <title>TimeBank</title>
        <?php require ('headlinks.php'); ?>

    </head>

    <body>
        <?php require ('header.php'); ?>

        <div id="loginbox">
            <div class="boxheader">
            </div>
            <h1 id="welcome">
                <?php echo "Welcome to the Timebank, " . ucfirst($username) . "!"?>
            </h1>
            <div id="buttons">
                <a href="index.php" id="dashbut" class="blue3 button multibutton">Login</a>
            </div>
        </div>





        <?php include ('footer.php'); ?>
    </body>




</html>