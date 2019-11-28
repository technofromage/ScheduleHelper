<?php

// Checks If USer Belongs To Given Group Returns Fales If Not
function validateUserWithDB($username, $password, $group)
{
    $SQL_database = $group;
    $SQL_servername = "localhost";
    $SQL_username = "root";
    $SQL_password = "";

    $conn = mysqli_connect($SQL_servername, $SQL_username, $SQL_password, $SQL_database);
    if (!$conn) 
    {
        echo "NO SUCH GROUP";
        return false;
    }

    $query = "SELECT * FROM `$group` WHERE username = \"$username\"";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if(!($row['username'] == $username && $row['password'] == $password)) {  return false; }

    $conn->close();
    return true;
}

// Checks If Valid Login Info Was REcived
function validLoginInfo()
{
    if(isset($_POST['GROUP_NAME']) && isset($_POST['USER_NAME']) && isset($_POST['PASSWORD'])) { return true; }

    return false;
}

?>