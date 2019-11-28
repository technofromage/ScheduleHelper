
<!-- This Is A Collumn In Our Table And We Will Orint Out Each Day Of The Week  -->


<?php

    function getGroupName()
    {
        if(isset($_POST['GROUP_NAME']))
        {
            return $_POST['GROUP_NAME'];
        }
        else if(isset($_GET['GROUP_NAME']))
        {
            return $_GET['GROUP_NAME'];
        }

        return "";
    }

    function getUserName()
    {
        if(isset($_POST['USER_NAME']))
        {
            return $_POST['USER_NAME'];
        }
        else if(isset($_GET['USER_NAME']))
        {
            return $_GET['USER_NAME'];
        }

        return "";
    }

    function drawRow()
    {
        echo("<tr>");


        // cALACATE tHE cURRENT hOUR we arE lSITING
        $FROM = $GLOBALS['hour'];
        $TO = $GLOBALS['hour'] + 1;
        $hour = "$FROM - $TO";

        // Draw Hour Marker
        echo("<th class=\"collumnTitle\">$hour</th>");

        // Connect To SQL DB
        $SQL_servername = "localhost";
        $SQL_username = "root";
        $SQL_password = "";
        $SQL_database = getGroupName();
        $conn = mysqli_connect($SQL_servername, $SQL_username, $SQL_password, $SQL_database);
        if(!$conn) { echo("BAD"); return; }

        //lOOP tHOUGH eaCH daY oF tHE wEEK
        for ($i=0; $i < 7 ; $i++) 
        { 
            $bBusy = false;

            // Loop Though All Group Members And Check If This Hour Is Busy On This Day Of The Week
            $query = "SELECT * FROM `$SQL_database`";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result))
            {
                $day = $row[3 + $i];
                $arr=explode(",",$day);



                // If Busy Then Draw Busy Box If It AMkes It To End Without Drawing Busy Box Then Draw Empty Box
                if($arr[intval($hour)] != '~')
                {
                    $x = $i;
                    $y = intval($hour);
                    echo("<th class=\"busyGroup\">--</th>");
                    $bBusy = true;
                    break;
                }
            }

            if(!$bBusy)
            {
                $x = $i;
                $y = intval($hour);
                echo("<th class=\"openBox\"></th>");
            }

            // If Busy Mark REd If Free MArk GReen
        }

        $conn->close();

        echo("</tr>");
    }

    function drawRowPersonal()
    {
        echo("<tr>");


        // cALACATE tHE cURRENT hOUR we arE lSITING
        $FROM = $GLOBALS['hour'];
        $TO = $GLOBALS['hour'] + 1;
        $hour = "$FROM - $TO";

        // Draw Hour Marker
        echo("<th class=\"collumnTitle\">$hour</th>");

        // Connect To SQL DB
        $SQL_servername = "localhost";
        $SQL_username = "root";
        $SQL_password = "";
        $SQL_database = getGroupName();
        $conn = mysqli_connect($SQL_servername, $SQL_username, $SQL_password, $SQL_database);
        if(!$conn) { echo("BAD"); return; }

        //lOOP tHOUGH eaCH daY oF tHE wEEK
        for ($i=0; $i < 7 ; $i++) 
        { 
            $bBusy = false;

            // Loop Though All Group Members And Check If This Hour Is Busy On This Day Of The Week
            $name = getUserName();
            $query = "SELECT * FROM `$SQL_database` WHERE username = '$name'";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result))
            {
                $day = $row[3 + $i];
                $arr=explode(",",$day);

                // If Busy Then Draw Busy Box If It AMkes It To End Without Drawing Busy Box Then Draw Empty Box
                if($arr[intval($hour)] != '~')
                {
                    $x = $i;
                    $y = intval($hour);
                    echo("<th onmouseover=\"updateVisualSelection($x, $y)\" onmouseup=\"tileMouseUp($x, $y)\" onmousedown=\"tileMouseDown($x, $y)\" class=\"busyPersonal\">--</th>");
                    $bBusy = true;
                    break;
                }
            }

            if(!$bBusy)
            {
                $x = $i;
                $y = intval($hour);
                echo("<th onmouseover=\"updateVisualSelection($x, $y)\" onmouseup=\"tileMouseUp($x, $y)\" onmousedown=\"tileMouseDown($x, $y)\" class=\"openBox\"></th>");
            }

            // If Busy Mark REd If Free MArk GReen
        }

        $conn->close();
        echo("</tr>");
    }
?>
    

