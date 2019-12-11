var CreateForm          = document.getElementsByClassName("CreateGroup")[0];
var JoinForm            = document.getElementsByClassName("JoinGroup")[0];

var CreateButton        = document.getElementsByClassName("ButtonSwitch")[0];
var JoinButton          = document.getElementsByClassName("ButtonSwitch")[1];

var newGroupCreate      = document.getElementById("newGroupCreate");
var newUserCreate       = document.getElementById("newUserCreate");
var newPasswordCreate   = document.getElementById("newPasswordCreate");

var newGroupJoin        = document.getElementById("newGroupJoin");
var newUserJoin         = document.getElementById("newUserJoin");
var newPasswordJoin     = document.getElementById("newPasswordJoin");

ShowJoin();

// Hide The Join Class And Show The Create Class
function ShowCreate()
{
    JoinForm.setAttribute("style", "display: none;");
    JoinButton.setAttribute("style", "background-color: #4CAF50;");

    CreateForm.setAttribute("style", "display: block;");
    CreateButton.setAttribute("style", "background-color: rgb(53, 128, 56);");
}

// Hide Create Class And Show Join Class
function ShowJoin()
{
    CreateForm.setAttribute("style", "display: none;");
    CreateButton.setAttribute("style", "background-color: #4CAF50;");

    JoinForm.setAttribute("style", "display: block;");
    JoinButton.setAttribute("style", "background-color: rgb(53, 128, 56);");

    console.log("HI");
}

function CreateGroup()
{
    //alert(GroupName.value );

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            if(this.responseText == "1")
            {
                alert("You Have Created A Group!");

                window.location.replace("../Login/login.php");
            }
            else
            {
                alert(this.responseText);
            }
        }
    };
    xmlhttp.open("GET", "./createGroup.php?USERNAME=" + newUserCreate.value + "&PASSWORD=" + newPasswordCreate.value + "&GROUP=" + newGroupCreate.value, true);
    xmlhttp.send();
}

function JoinGroup()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            if(this.responseText == "1")
            {
                alert("You Have Joined A Group!");

                window.location.replace("../Login/login.php");
            }
            else
            {
                alert(this.responseText);
            }
        }
    };
    xmlhttp.open("GET", "./joinGroup.php?USERNAME=" + newUserJoin.value + "&PASSWORD=" + newPasswordJoin.value + "&GROUP=" + newGroupJoin.value, true);
    xmlhttp.send();
}