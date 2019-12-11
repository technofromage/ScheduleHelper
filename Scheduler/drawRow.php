
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
			$colorR=205;
			$colorG=205;
			$colorB=192;
			$modR=0;//not modding any green to prevent color black
            $modB=0;
            
            $names = "";
            // Loop Though All Group Members And Check If This Hour Is Busy On This Day Of The Week
            $query = "SELECT * FROM `$SQL_database`";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result))
            {
                $day = $row[3 + $i];
                $username = $row['username'];
				$modR=12*ord($username) % 150;
                $modB=((31 * strlen($username)) % 110) + 20;
                $modG=((2 * crc32($username)) % 150) + 20;
                $arr=explode(",",$day);
                
                if($arr[intval($hour)] != '~')
                {
                    $colorR-=$modR;//this way overlaping schedules will appear different colors
                    $colorB-=$modB;
                    $colorG-=$modG;
					if ($colorR<0) $colorR=0;
                    if ($colorB<0) $colorB=0;
                    
                    $names = "$names $username <br />";
                }
            }
			// draw box - If Busy then color will be default
			$x = $i;
			$y = intval($hour);
            echo("<th class=\"openBox\" style=\"background-color: rgb({$colorR},  {$colorG},  {$colorB})\">  <span class=\"tooltiptext\">$names</span> </th>");


            // If Busy Mark Red If Free Mark Grey
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
				
				$username = $row['username'];
				$colorR=205-(12*ord($username) % 150);//this should be similar to modR in drawRow()
				if ($colorR<0) $colorR=0;
				$colorB=193-(((31 * strlen($username)) % 110) + 20);//this should be similar to modB in drawRow()
				if ($colorB<0) $colorR=0;
				
                // If Busy Then Draw Busy Box If It Makes It To End Without Drawing Busy Box Then Draw Empty Box
                if($arr[intval($hour)] != '~')
                {
                    $x = $i;
                    $y = intval($hour);
                    echo("<th onmouseover=\"updateVisualSelection($x, $y)\" onmouseup=\"tileMouseUp($x, $y)\" onmousedown=\"tileMouseDown($x, $y)\" class=\"openbox\" style=\"background-color: rgb({$colorR}, 205, {$colorB}\">--</th>");
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
    

