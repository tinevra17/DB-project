<?php
session_start();
?>


<html>
    <body>

        <?php
        // Echo session variables that were set on previous page
        echo "Welcome  Advisor, " . $_SESSION["name"] . ".<br>";
        echo "email  " . $_SESSION["email"] . ".<br>";
        echo "password " . $_SESSION["password"] . ".<br>";
        echo "username " . $_SESSION["username"] . ".<br>";
        ?>

    </body>
    <br/>
    <br/>

    <body>
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

    </body>

</html>
