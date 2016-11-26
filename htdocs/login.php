<?php

$loginErr = "";

if(isset($_SESSION['loginErrorMsg'])) {
    $loginErr = $_SESSION['loginErrorMsg'];
}

?>

<div id="loginbox">
    <div class="boxheader">
        <h1>Login</h1>
    </div>
    <form id="login" action=checklogin.php method="post">
        <?php 
        if($loginErr != "") echo '<p id="error" style="color:darkred;">'.$loginErr.'</p>';

        ?>
        <p>Email Address</p>
        <input type="text" name="loginemail">
        <p>Password</p>
        <input type="password" name="loginpw">
        <a href="remindpage.html" id="remind">
            <p>Forgotten details?</p></a>
        <div id="buttons">
            <a href='signup.php' id="signupbutton" class="blue2 button multibutton">Sign Up</a>
            <button id="loginbutton" class="button multibutton blue3" type="submit">Login</button>
        </div>
    </form>
</div>

<?php
if(isset($_SESSION['loginErrorMsg'])) {
    unset($_SESSION['loginErrorMsg']);
}
?>