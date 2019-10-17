var CreateForm  = document.getElementsByClassName("CreateGroup")[0];
var JoinForm    = document.getElementsByClassName("JoinGroup")[0];

var CreateButton = document.getElementsByClassName("ButtonSwitch")[0];
var JoinButton = document.getElementsByClassName("ButtonSwitch")[1];

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
    alert("Create Group Needs To Be Implemented");
}

function JoinGroup()
{
    alert("Join Group Needs To Be Implmneted");
}