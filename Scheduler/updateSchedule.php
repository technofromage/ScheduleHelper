<?php


    if(!(isset($_GET['USER_NAME']) && isset($_GET['GROUP_NAME']) && isset($_GET['DAY']) && isset($_GET['HOUR']))) { echo("0"); die(); }

    $SQL_servername = "localhost";
    $SQL_username = "root";
    $SQL_password = "";
    $SQL_database = $_GET['GROUP_NAME'];

    $conn = mysqli_connect($SQL_servername, $SQL_username, $SQL_password, $SQL_database);
    if (!$conn) 
    {
        echo "0";
        die();
    }

    $user = $_GET['USER_NAME'];
    $table = $_GET['GROUP_NAME'];
    $day = intval($_GET['DAY']);
    $hour = intval($_GET['HOUR']);

    $query = "SELECT * FROM `$table` WHERE username = '$user'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);

    // Conver Day Into Array Of Hours
    $dataForDay = explode(",", $row[3 + $day]);
    // Set The Hour MArjed AS Bust
    if($dataForDay[$hour] == '~')
    {
        $dataForDay[$hour] = '1'; 
    }
    else
    {
        $dataForDay[$hour] = '~'; 
    }
    
    // Insert DAy Back In into String Form
    $row[3 + $day] = implode(",", $dataForDay);

    //$test = $row[3 + $day];
    //echo("$test");

    $sunday     = $row[3];
    $monday     = $row[4];
    $tuesday    = $row[5];
    $wednesday  = $row[6];
    $thursday   = $row[7];
    $friday     = $row[8];
    $saturday   = $row[9];

    // UPDATE MYSQL
    $query = "UPDATE `$table` SET `sunday` = '$sunday', `monday` = '$monday', `tuesday` = '$tuesday', `wednesday` = '$wednesday', `thursday` = '$thursday', `friday` = '$friday', `saturday` = '$saturday' WHERE `$table`.`username` = '$user'";

    mysqli_query($conn, $query);

    $conn->close();

    //echo("1");




    // Update USer In Database With New Schdule DAta


?>