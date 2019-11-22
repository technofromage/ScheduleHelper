var scheduleContainer = document.getElementsByClassName("scheduleContainer")[0];

function tileMouseDown(x, y)
{
    // Don't Do Anything Just Store The Tile The Coordiantes Mouse Down Was PRessed
}

function tileMouseUp(x, y)
{
    // Calcate All Tiles Betwween The Mouse Down And Mouse Up And Loop Through Each One


}

function updateSchedule(x, y, user)
{
    // AJAX Call The "updateSchedule.php" And PAss It The Tile You Want To Modify And The User You Are Modifying It For (ie The USer Logged In)

    // AJAX CAll The buildSchedule.php and insert new schdule into html of this page
    scheduleContainer.innerHTML = "NEW SCHDULE HTML RETURNED FROM PHP AJAX CALL"
}