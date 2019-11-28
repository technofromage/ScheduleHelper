<!DOCTYPE html>

<html>

    <link rel="stylesheet" href="../SheduleHelper.css">

    <body>

        <!-- This Is The Container That Will Contain The HTML For The Scheduler -->
        <table class="scheduleContainer">

            <!-- This Will Execute The PHP Scipt And Insert Anything The SCript Echos Into This Div -->
            <?php include("./buildSchedule.php"); ?>

        </table>

    </body>

    <script src="./login.js"></script>

</html>