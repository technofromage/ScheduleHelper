<!DOCTYPE html>

<html>

    <link rel="stylesheet" href="./login.css">

    <body>

        <div class="Name">Schedule Helper</div>

        <a href="../Register/register.php" class="Create">Don't have an account Click Here!</a>

            <div>

                <div class="Container">

                    <title>Login</title>

                    <span></span>

                    <form action="../Scheduler/scheduler.php" method="post">

                        <h1>Group:</h1>

                            <Input type="text" placeholder="Group" name="GROUP_NAME" >

                        <h1>Username:</h1>

                            <Input type="text" placeholder="Username" name="USER_NAME">

                        <h1>Password:</h1> 

                            <Input type="password" placeholder="Password" name="PASSWORD">

                            <input class="Button" onclick="Login()" type="submit" value="Login" >

                    </form>

                </div>
                
            </div>

        </div>

    </body>

    <script src="./login.js"></script>

</html>