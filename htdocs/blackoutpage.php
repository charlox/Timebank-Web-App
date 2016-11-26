
<form id="requestform" action="sendrequest.php" method="post">
    <div id="blackoutscreen1" class="blackout">
        <div id="requestBox" class="popoutform">
            <h1>Submit a Request</h1>
            From User: (email address or telephone)<br> <input type="text" name="newreqfrom" required><br>
            Hours:<br> <input type="number" name="newreqdur" required><br>
            Details:<br><textarea cols="40" rows="5" name="newreqdesc" required> </textarea><br>
            Date of work:<br><input type="date" name="newreqdate"><br>


            <a href="dash.php" onclick='reqBox("none")' type="reset" class="button blue2 multibutton">Cancel</a>
            <button name="subreqbut" type="submit" class="button blue3 multibutton">Request</button>
        </div>
    </div>
</form>

<?php

require('dash.php');

?>