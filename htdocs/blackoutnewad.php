
<form id="newadform" action=submitnewad.php method="post">
    <div id="blackoutscreen2" class="blackout">
        <div id="newAdBox" class="popoutform">
            <h1>Create a New Advert</h1>
            <label>Title:</label><br> <input type="text" name="newadtitle" required><br>
            <label>Details:</label><br><textarea cols="40" rows="5" name="newaddesc" required></textarea><br>
            <label>Contact:</label><br> <input type="text" name="newadcontact" required><br>
            <label>Location:</label><br> <input type="text" name="newadloc" required><br>
            <label>Duration (hours):</label><br> <input type="number" name="newaddur" required><br>
            <a href='dash.php' type="reset" class="button blue2 multibutton">Cancel</a>
            <button type="submit" class="button blue3 multibutton">Submit</button>
        </div>
    </div>
</form>

<?php require ('dash.php'); ?>