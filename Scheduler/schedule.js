var scheduleContainer = document.getElementsByClassName("scheduleContainer")[1];

// The Cordiantes Of Where The Drag Started
var downStartX = -1;
var downStartY = -1;

var hourSlots = [];

function tileMouseDown(x, y)
{
    // Don't Do Anything Just Store The Tile The Coordiantes Mouse Down Was PRessed
    downStartX = x;
    downStartY = y;
}

function tileMouseUp(x, y)
{
    // Calcate All Tiles Betwween The Mouse Down And Mouse Up And Loop Through Each One

    // Loop Though All Hours In The Week
    for(var i = 0; i <= 7; i++)
    {
        for (var j = 0; j <= 23; j++) 
        {
            // Check If This Hour Is Selected
            if(between(downStartX, x, i) && between(downStartY, y, j))
            {
                hourSlots.push([i, j]);
            }
        }
    }

    updateHourSlots();

    downStartX = -1;
    downStartY = -1;

    //updateSchedule();
}

function updateVisualSelection(x, y)
{
    if(downStartX < 0) { return; }
    // Reset 

    //alert("visual");
    //console.log("" + x + " : " + y)

    // Loop Though All Selected Hour Spots And Change Color
    for(var i = 0; i <= 7; i++)
    {
        for (var j = 0; j <= 23; j++) 
        {
            if(between(downStartX, x, i) && between(downStartY, y, j))
            {
                //console.log(row = document.getElementById("scheduleContainer").rows[i + 1].cells[1]);
                row = scheduleContainer.rows[j + 1].cells[i + 1].style.backgroundColor  = "blue";
            } 
            else if(scheduleContainer.rows[j + 1].cells[i + 1].style.backgroundColor == "blue")
            {
                row = scheduleContainer.rows[j + 1].cells[i + 1].style.backgroundColor  = "rgb(205, 205, 192";
            }
        }
    }
}

function between(num1, num2, val)
{
    if(num1 > num2)
    {
        if(val >= num2 && val <= num1) { return true; }
        return false;
    }
    else
    {
        if(val >= num1 && val <= num2) { return true; }
        return false;
    }

    return false;
}

function updateHourSlots()
{
    if(hourSlots.length <= 0) { updateSchedule(); updateSchedulePersonal(); return; }

    var coord = hourSlots.pop();

    // Tell SErver To MArk This hour As Busy
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            updateHourSlots();
        }
    };
    xmlhttp.open("GET", "./updateSchedule.php?DAY=" + coord[0] + "&HOUR=" + coord[1] + "&USER_NAME=" + document.getElementById("user").innerHTML + "&GROUP_NAME=" + document.getElementById("group").innerHTML, true);
    xmlhttp.send();
}

function updateSchedule()
{
    // AJAX Call The "updateSchedule.php" And PAss It The Tile You Want To Modify And The User You Are Modifying It For (ie The USer Logged In)
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementsByClassName("scheduleContainer")[0].innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./buildSchedule.php?USER_NAME=" + document.getElementById("user").innerHTML + "&GROUP_NAME=" + document.getElementById("group").innerHTML, true);
    xmlhttp.send();

    // AJAX CAll The buildSchedule.php and insert new schdule into html of this page
    scheduleContainer.innerHTML = "NEW SCHDULE HTML RETURNED FROM PHP AJAX CALL"
}

function updateSchedulePersonal(x, y, user)
{
    // AJAX Call The "updateSchedule.php" And PAss It The Tile You Want To Modify And The User You Are Modifying It For (ie The USer Logged In)
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            document.getElementsByClassName("scheduleContainer")[1].innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "./buildSchedulePersonal.php?USER_NAME=" + document.getElementById("user").innerHTML + "&GROUP_NAME=" + document.getElementById("group").innerHTML, true);
    xmlhttp.send();

    // AJAX CAll The buildSchedule.php and insert new schdule into html of this page
    scheduleContainer.innerHTML = "NEW SCHDULE HTML RETURNED FROM PHP AJAX CALL"
}


function refresh()
{
    updateSchedule();
    updateSchedulePersonal();
    
}

function logOut()
{
    window.location.href = "../Login/login.php";
}