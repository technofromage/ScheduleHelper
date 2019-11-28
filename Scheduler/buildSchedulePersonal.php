<?php

    // Connect To MYSQL Server (See createGroup.php for example)
    include_once("./drawCollumnTitle.php");
    include_once("./drawRow.php");

    // Loop Though Days Of The Weeks And Draw Collumn Names
    drawCollumnTitles();

    // Loop Throuh All Hours Of The Day 0-23 ie Each Row In The Table
    for ($i=0; $i < 24; $i++) 
    {
        // Draw Hour Tile To MArk Which Hour This Row REpresents
        $GLOBALS['hour'] = $i;

        drawRowPersonal();
    }
?>