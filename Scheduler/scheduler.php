<!DOCTYPE html>

<?php

    include_once("./validate.php");

    // Check That We REcived Login Info
    
    if(!validLoginInfo()) { header("Location: ../Login/login.php"); }

    if(!validateUserWithDB($_POST['USER_NAME'], $_POST['PASSWORD'], $_POST['GROUP_NAME'])) {  header("Location: ../Login/login.php");  }

?>

<html>

    <link rel="stylesheet" href="./scheduler.css">

    <body>

    <div class="optionsContainer">

        <input onmousedown="refresh()" class="Button" type="button" value="Refresh">

        <input onmousedown="logOut()" class="Button" type="button" value="Log Out" style="float:right">

    </div>

    <div id="group"><?php echo($_POST['GROUP_NAME']); ?></div>
    <div id="user"><?php echo($_POST['USER_NAME']); ?></div>


    <label class="switch">
        <div class="mode">Mode: View</div>
        <input id="check" type="checkbox" onclick="updateMode()">
        <span class="slider round"></span>
    </label>


    <div class="chartsHolder">

    <div class="tableHolder">

        <div class="tableTitle"> Group Schedule </div>

        <!-- This Is The Container That Will Contain The HTML For The Scheduler -->
        <table id="scheduleContainer" class="scheduleContainer">
            
            <!-- This Will Execute The PHP Scipt And Insert Anything The SCript Echos Into This Div -->
            <?php include("./buildSchedule.php"); ?>

        </table>

        </div>

        <div class="tableHolder">

        <div class="tableTitle"> Your Schedule </div>

        <!-- This Is The Container That Will Contain The HTML For The Scheduler -->
        <table id="scheduleContainer" class="scheduleContainer">

            <!-- This Will Execute The PHP Scipt And Insert Anything The SCript Echos Into This Div -->
            <?php include("./buildSchedulePersonal.php"); ?>

        </table>
        </div>

    </div>

    </body>

    <script src="./schedule.js"></script>

</html>