<?php

    if(!(isset($_GET["USERNAME"]) && isset($_GET["PASSWORD"]) && isset($_GET["GROUP"]))) { echo("NEW GROUP DATA WAS NOT PASSED"); return; }

    $ADMIN_USERNAME = $_GET["USERNAME"];
    $ADMIN_PASSWORD = $_GET["PASSWORD"];
    $GROUP_NAME     = $_GET["GROUP"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    
    // Check connection
    if (!$conn) 
    {
        echo "FAILED TO CONNECT TO DATABASE";
        return;
    }

    // Check If Database Exist If Not Create New One For This Group
    $query = "CREATE DATABASE IF NOT EXISTS $GROUP_NAME;";
    if($conn->query($query) === FALSE)
    {
        echo("FAILED TO CREATE DATABASE: $GROUP_NAME"); return;
    }

    // Create TAble For Group In Database
    $query = "DROP TABLE IF EXISTS $GROUP_NAME.$GROUP_NAME";
    $conn->query($query);
    $query = "CREATE TABLE `$GROUP_NAME`.`$GROUP_NAME` ( `id` INT(16) NOT NULL AUTO_INCREMENT , `username` VARCHAR(512) NOT NULL , `password` VARCHAR(512) NOT NULL , `sunday` VARCHAR(2048) NOT NULL DEFAULT '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~' , `monday` VARCHAR(2048) NOT NULL DEFAULT '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~' , `tuesday` VARCHAR(2048) NOT NULL DEFAULT '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~' , `wednesday` VARCHAR(2048) NOT NULL DEFAULT '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~' , `thursday` VARCHAR(2048) NOT NULL DEFAULT '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~' , `friday` VARCHAR(2048) NOT NULL DEFAULT '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~' , `saturday` VARCHAR(2048) NOT NULL DEFAULT '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~' , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
    if($conn->query($query) === FALSE)
    {
        echo("FAILED TO CREATE TABLE: $query"); return;
    }

    // Close Connection An Open Conene tion To This Grous Datatbase
    $conn->close();
    $conn = mysqli_connect($servername, $username, $password, $GROUP_NAME);
    if (!$conn) 
    {
        echo "FAILED TO CONNECT TO GROUPS DATABASE";
        return;
    }

    // Add First User To Group
    $query = "INSERT INTO `$GROUP_NAME` (`id`, `username`, `password`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) VALUES (NULL, '$ADMIN_USERNAME', '$ADMIN_PASSWORD', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~')";
    if($conn->query($query) === FALSE)
    {
        echo("FAILED TO ADD ADMIN USER: $query"); return;
    }

    // Create SQL Database For The New Group
    $conn->close();
    echo("1");
?>