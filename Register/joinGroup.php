<?php

    if(!(isset($_GET["USERNAME"]) && isset($_GET["PASSWORD"]) && isset($_GET["GROUP"]))) { echo("NEW GROUP DATA WAS NOT PASSED"); return; }

    $USERNAME = $_GET["USERNAME"];
    $PASSWORD = $_GET["PASSWORD"];
    $GROUP_NAME = $_GET["GROUP"];

    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $GROUP_NAME);
    if (!$conn) 
    {
        echo "NO SUCH GROUP";
        return;
    }

    // Add First User To Group
    $query = "INSERT INTO `$GROUP_NAME` (`id`, `username`, `password`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`) VALUES (NULL, '$USERNAME', '$PASSWORD', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~', '~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~,~')";
    if($conn->query($query) === FALSE)
    {
        echo("FAILED TO ADD ADMIN USER: $query"); return;
    }

    // Create SQL Database For The New Group
    $conn->close();

?>