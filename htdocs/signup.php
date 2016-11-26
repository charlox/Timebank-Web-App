<?php
session_start();


?>

<html>
    <head>
        <meta lang="en">
        <title>TimeBank - Sign Up</title>
        <?php require ('headlinks.php'); ?>

    </head>

    <body>
        <?php require ('header.php'); ?>

        <div id="loginbox">
            <div class="boxheader">
                <h1>Sign Up</h1>
            </div>

            <?php 
            if(isset($_SESSION['errorMessage'])) echo '<p id="error" style="color:darkred; text-align:center;">'.$_SESSION['errorMessage'].'</p>';

            ?>

            <form id="signup" action=checkdetails.php method="post">
                <p> First Name</p>
                <input type="text" id="newname" name="newname" required>
                <p>Surname</p>
                <input type="text"id="newsurname" name="newsurname" required>
                <p>Date of Birth</p>
                <input type="date" id="newbd" name="newbd" required>
                <p>Email address</p>
                <input type="email" id="newemail" name="newemail" required>
                <p>Password</p>
                <input type="password" id="newpw" name="newpw" required>
                <p>Confirm Password</p>
                <input type="password" id="newpwconf" name="newpwconf" required>
                <p>Phone number (optional)</p>
                <input type="tel" id="newtel" name="newtel">
                <div id="buttons">
                    <a href="index.php" class="button blue2 multibutton">Cancel</a>
                    <button id="submitnewuser" class="blue3 button multibutton" type="submit">Sign Me Up!</button>
                </div>
            </form>
        </div>


        <?php include ('footer.php'); 
        if(isset($_SESSION['errorMessage'])) {
                unset($_SESSION['errorMessage']);
            }?>

    </body>

</html>