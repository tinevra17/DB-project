<?php
session_start();
?>


<html>
    <head>
        <title>CS Advising</title>
    </head>

    <body bgcolor="F5F5F5">

        <fieldset>
        <legend><h2>Advisor Home</h2></legend>


        <?php
        // Echo session variables that were set on previous page
        echo "Welcome, " . $_SESSION["name"] . "!<br>";
        echo "Email:  " . $_SESSION["email"] . "<br>";
        echo "Password: " . $_SESSION["password"] . "<br>";
        echo "Username: " . $_SESSION["username"] . "<br>";
        ?>

        <br/>

        <form action=".php" action="">
            <input name="viewCourses" type="submit" value="View Courses" />
        </form>

        <form action="appointment.php" action="">
            <input name="appointments" type="submit" value="Appointments" />
        </form>


        <form action="changePassword.php" action="">
            <input name="changePassword" type="submit" value="Change Password" />
        </form>

        <form action="logout.php" action="">
            <input name="logOut" type="submit" value="Log out" />
        </form>
        </fieldset>


        <center>
        <img src="uteplogo.png" width="50%"/>
        </center>

    </body>

</html>
