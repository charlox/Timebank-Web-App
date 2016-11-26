<?php
require ('conn2d.php');
$id = $_SESSION['currentUserID'];
$query = "select * from admins where admin_id='$id';";
$result = mysqli_query($conn, $query);
if ($result = $conn->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $_SESSION['name'] = $row["forename"];
        $_SESSION['surname'] = $row["surname"];
    }
}

?>

<div class='main'>
    <div class='columncontainer'>
        <div id="pdboxadmin" class="floatingbox">

            <h1><img src='img/personicon.png' class='icon'>Logged In as <?php echo ucfirst($_SESSION['name']) . " " . ucfirst($_SESSION['surname']); ?></h1>
            <div class="buttons">
                <a href='editadmindets.php' class="button blue3 multibutton" id="editdet">Edit My Details</a>
            </div>
        </div>
        
                <div id="membersbox" class="floatingbox" style="margin-bottom:100px;">
            <h1><img src='img/personicon.png' class='icon'>Recent Members</h1>

            <div id='userresults'>
                <form action="sarchmembers.php" method="get">
                    <input type="text" name="membersearch" placeholder="Member Search" style="display:block; margin:0 auto;" required>
                    <button class="button blue3 multibutton" type="submit" style="width:50px; display:inline-block;">Go</button>
                    <a class="button  multibutton blue3" href="clearmember.php" style="width:50px; display:inline-block;">Clear</a>
                </form>
                <?php
                $query = "select * from members order by member_id desc limit 5;";
                if(isset($_SESSION['memsearchcriteria'])) {
                    $crit = $_SESSION['memsearchcriteria'];
                    $query = "select * from members where member_id like '%" . $crit . "%' or forename like '%". $crit . "%' or surname like '%" . $crit . "%' or email_address like '%" . $crit . "%' or phone_number like '%" . $crit . "%' or hour_balance like '%" . $crit . "%' order by member_id desc;";
                }
                $result = mysqli_query($conn, $query);
                $match = mysqli_num_rows($result);

                if($match >0) {
                    if ($result = $conn->query($query)) {

                        #Generates element for matching owned ads
                        while ($row = $result->fetch_assoc()) {
                            $memid = $row['member_id'];
                            $forename = $row['forename'];
                            $surname = $row['surname'];
                            $element = "
                <div class='slider'>
            <form action=editdets.php method='post'>
            <button type='submit' name='mem_det' value=". $memid ." id=" . $memid . " class='dashad'>
            <p class='dashaddate' style='text-decoration:none;'> User #" . $memid . "</p>
            <h3 class='dashadtit' style='text-decoration:none;'>" . ucfirst($forename) . " " . ucfirst($surname) . "</h3> 
            </button>
            </form>
            </div>
            ";
                            echo $element;
                        }
                    }
                } else {
                    echo
                        "<h1 style='color:darkred;'>No results.</h1>";
                }

                ?>
            </div>

        </div>

    </div>
    <div class='doublecontainer'>
        <div class="floatingbox" id="openreqbox" style='padding-bottom:30px;'>
            <h1><img src="img/clockicon.png" class="icon">Open Time Requests</h1>
            <div id='reqresults'>
                <div class="advslider">
                    <p class="viewaddesc">Date</p>
                </div>
                <div class="advslider"><p class="viewaddesc">Requesting User</p></div>
                <div class="advslider"><p class="viewaddesc">Regarding User</p></div>
                <?php
                $query = 'select * from active_requests where status="active";';
                $result = mysqli_query($conn, $query);
                $match = mysqli_num_rows($result);
                //header('location:blackerror.php');

                if($match>0) {
                    if ($result = $conn->query($query)) {

                        #Generates element for matching ads
                        while ($row = $result->fetch_assoc()) {
                            $reqid = $row['request_ID'];
                            $requester = $row['requester'];
                            $reqfrom = $row['requested_from_user'];
                            $dur = $row['hours_requested'];
                            $desc = $row['req_desc'];
                            $date = $row['work_date'];
                            $element = "
                <form action=viewreqdets.php method='post'><button type='submit' name='viewreq' value='". $reqid ."' id='" . $reqid . "' class='viewad' style='padding:0;'>
                <div class='advslider'>
                <p style='padding:0;' class='viewaddesc'>" . $date . "</p>
                </div>
                <div class='advslider'>
                <h3 class='viewadtit' style='text-decoration:none; padding:0; margin:0;'>" . $requester . "</h3>
                </div>
                <div class='advslider'>
                <h3 class='viewadtit' style='text-decoration:none; padding:0;'>
                " . $reqfrom . "</p> 
                </div>
                </button></form>
                ";

                            echo $element;
                        }
                    }

                } else {
                    echo
                        "<h1 style='color:darkred;'>No active requests.</h1>";

                }

                ?>






            </div>
        </div>
    </div>



    <div class='columncontainer'>
        <div id="myadsbox" class="floatingbox" style="margin-bottom:100px;">
            <h1><img src='img/myadsicon.png' class='icon'>Recent Adverts</h1>

            <div id='adresults'>
                <form action="search.php" method="get">
                    <input type="text" name="adsearch" placeholder="Keywords or Location" style="display:block; margin:0 auto;" required>
                    <button class="button blue3 multibutton" type="submit" style="width:50px; display:inline-block;">Go</button>
                    <a class="button  multibutton blue3" href="clear.php" style="width:50px; display:inline-block;">Clear</a>
                </form>
                <?php
                $query = "select * from adverts order by advert_id desc limit 5;";
                if(isset($_SESSION['searchcriteria'])) {
                    $crit = $_SESSION['searchcriteria'];
                    $query = "select * from adverts where advert_title like '%" . $crit . "%' or details like '%". $crit . "%' or location like '%" . $crit . "%' order by advert_id desc;";
                }
                $result = mysqli_query($conn, $query);
                $match = mysqli_num_rows($result);

                if($match >0) {
                    if ($result = $conn->query($query)) {

                        #Generates element for matching owned ads
                        while ($row = $result->fetch_assoc()) {
                            $adid = $row['advert_id'];
                            $title = $row['advert_title'];
                            $pdate = $row['date_posted'];
                            $element = "
                <div class='slider'>
            <form action=adminaddets.php method='post'>
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
                } else {
                    echo
                        "<h1 style='color:darkred;'>No results.</h1>";
                }

                ?>
            </div>

        </div>




    </div>
</div>

<?php mysqli_close($conn); ?>