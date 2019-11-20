<!DOCTYPE html>

<html>

    <link rel="stylesheet" href="./register.css">

    <body>

        <div class="Name">Schedule Helper Registration</div>

        <a href="../Login/login.php" class="Create">Back to login.</a>

            <div>

                <div class="Container" class="Switcher">

                    <div class="SwitchPanel">
                        <button class="ButtonSwitch" onclick="ShowCreate()"> Create Group </button>
                        <button class="ButtonSwitch" onclick="ShowJoin()"> Join Group </button>
                    </div>

                    <span></span>

                    <div class="JoinGroup">

                        <title>Join Group</title>

                        <span></span>


                        <h1>Group Name:</h1>
                        <Input type="text" id="newGroupJoin" placeholder="Group Name" name="GROUP_NAME" >

                        <h1>Your Username:</h1>
                        <Input type="text" id="newUserJoin" placeholder="Username" name="USER_NAME">

                        <h1>Your Pass:</h1> 
                        <Input type="password" id="newPasswordJoin" placeholder="Password" name="PASSWORD">

                        <input class="Button" onclick="JoinGroup()" type="submit" value="Join Group" >


                    </div>

                    <div class="CreateGroup">

                        <title>Create Group</title>

                        <span></span>


                        <h1>Group Name:</h1>
                        <Input type="text" id="newGroupCreate" placeholder="Group Name" name="GROUP_NAME" >

                        <h1>Your Username:</h1>
                        <Input type="text" id="newUserCreate" placeholder="Username" name="USER_NAME">

                        <h1>Your Pass:</h1> 
                        <Input type="password" id="newPasswordCreate" placeholder="Password" name="PASSWORD">

                        <input class="Button" onclick="CreateGroup()" type="submit" value="Create Group" >

                    </div>
                
                </div>
                
            </div>

        </div>

    </body>

    <script src="./register.js"></script>

</html>