
<div id="head">
    <img src="img/logo.png" id="logo" alt="logo" style="display:block; margin:0px auto; height:inherit; width:auto;">
    <?php
    if(isset($_SESSION['currentUserID'])) {
        require ('logoutbutton.php');
    }
    ?>
</div>
