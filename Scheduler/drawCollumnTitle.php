
<!-- This Is A Collumn In Our Table And We Will Orint Out Each Day Of The Week  -->
<tr>

    <?php

        // Echo Empty Tile That Will Be In Top Left Corner
        echo("<th class=\"collumnTitle\"></th>");
    
        // Loop Though Each Day Of The Week And Print Out The Day
        for ($i=0; $i < 7; $i++) 
        { 
            $day = "";
            switch ($i) 
            {
                case 0:
                    $day = "Sunday";
                    break;

                case 1:
                    $day = "Monday";
                    break;

                case 2:
                    $day = "Tuesday";
                    break;

                case 3:
                    $day = "Wednesday";
                    break;

                case 4:
                    $day = "Thursday";
                    break;

                case 5:
                    $day = "Friday";
                    break;

                case 6:
                    $day = "Saturday";
                    break;
            
                default:
                    $day = "Sunday";
                    break;
            }
            
            echo("<th class=\"collumnTitle\">$day</th>");
        }

    ?>

</tr>