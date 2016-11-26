
<?php
require ('conn2d.php');
$id = $_SESSION['currentUserID'];
$query = "select * from members where member_id='$id';";
$result = mysqli_query($conn, $query);
if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $_SESSION['name'] = $row["forename"];
        $_SESSION['surname'] = $row["surname"];
        $_SESSION['hoursBal'] = $row['hour_balance'];
    }
}

?>
<div class="main">
<div class="columncontainer">
    <div id="myadsbox" class="floatingbox" style="margin-bottom:100px;">
        <h1><img src='img/myadsicon.png' class='icon'>My Adverts</h1>
        <div class="buttons">
            <a href='blackoutnewad.php' class="button blue3 singlebutton" id="newad">Create New Advert</a>
        </div>

        <div id='adresults'>
            <?php

            $id = $_SESSION['currentUserID'];
            $query = "select * from adverts where owner_id='$id' order by advert_id desc;";
            $result = mysqli_query($conn, $query);
            if ($result = $conn->query($query)) {

                #Generates element for matching owned ads
                while ($row = $result->fetch_assoc()) {
                    $adid = $row['advert_id'];
                    $title = $row['advert_title'];
                    $pdate = $row['date_posted'];
                    $element = "
                <div class='slider'>
            <form action=addets.php method='post'>
            <button type='submit' name='advert' value=". $adid ." id=" . $adid . " class='dashad'>
            <p class='dashaddate' style='text-decoration:none;'>" . $pdate . "</p>
            <h3 class='dashadtit' style='text-decoration:none;'>" . ucfirst($title) . "</h3> 
            </button>
            </form>
            </div>
            ";
                    echo $element;
                }
            }

            ?>
        </div>
    </div>
</div>

<div id="searchcontainer">
    <div id="searchbox" class="floatingbox" style="margin-bottom:100px;">
        <h1><img src='img/searchicon.png' class='icon'>Find Adverts</h1>
        <form id="worksearch" action="search.php" method="get">
            <input type="text" name="typesearch" class="searchbar" placeholder="Keywords or Location" required>
            <button class="button blue3 multibutton" type="submit" style="width:50px; display:inline-block;">Go</button>
            <a class="button  multibutton blue3" href="clear.php" style="width:50px; display:inline-block;">Clear</a>
        </form>
        <div id='searchresults'>
            <?php
            if(isset($_SESSION['searchcriteria'])) {
                $crit = $_SESSION['searchcriteria'];
                $query = "select * from adverts where advert_title like '%" . $crit . "%' or details like '%". $crit . "%' or location like '%" . $crit . "%' order by advert_id desc;";
                $result = mysqli_query($conn, $query);
                $match = mysqli_num_rows($result);
                //header('location:blackerror.php');

                if($match>0) {
                    if ($result = $conn->query($query)) {

                        #Generates element for matching ads
                        while ($row = $result->fetch_assoc()) {
                            $adid = $row['advert_id'];
                            $title = $row['advert_title'];
                            $date = $row['date_posted'];
                            $loc = $row['location'];
                            $element = "
                <form action=viewaddets.php method='post'><button type='submit' name='viewadvert' value=". $adid ." id=" . $adid . " class='viewad' style='padding:0;'>
                <div class='advslider'>
                <p style='text-align:left; padding:0;' class='viewaddesc'>" . $date . "</p>
                </div>
                <div class='advslider'>
                <h3 class='viewadtit' style='text-decoration:none; padding:0; margin:0;'>" . ucfirst($title) . "</h3>
                </div>
                <div class='advslider'>
                <p class='viewaddesc' style='text-decoration:none; padding:0;'>
                <img src='img/locic.png' id='locic' class='icon'>
                " . $loc . "</p> 
                </div>
                </button></form>
                ";

                            echo $element;
                        }
                    }

                } else {
                    echo
                        "<h1 style='color:darkred;'>No results.</h1>";

                }

            }

            ?>
        </div>
    </div>
</div>


<div class="columncontainer">
    <div id="pdbox" class="floatingbox">

        <h1><img src='img/personicon.png' class='icon'>Logged In as <?php echo ucfirst($_SESSION['name']) . " " . ucfirst($_SESSION['surname']); ?></h1>
        <div class="buttons">
            <a href='editdets.php' class="button blue3 multibutton" id="editdet">Edit My Details</a>
        </div>
    </div>
    <div id="balancebox" class="floatingbox">

        <h1><img src='img/clockicon.png' class='icon'>Current Hours</h1>
        <h2 id="balance"><?php echo $_SESSION['hoursBal']; ?></h2>
        <div class="buttons">
            <a href='blackoutpage.php' class="button blue3 multibutton" id="req">Request</a>
        </div>
    </div>
</div>
    </div>




<?php mysqli_close($conn);?>