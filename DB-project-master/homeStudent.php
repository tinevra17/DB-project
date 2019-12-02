

<html>

    <head>
        <title>CS Advising</title>
    </head>

    <body bgcolor="F5F5F5">

        <fieldset>
        <legend><h2>Student Home</h2></legend>

        <?php
session_start();
?>
<?php
    include "config.php";
    // Echo session variables that were set on previous page
    echo "Welcome, " . $_SESSION["name"] . "!<br>";
    echo "Email:  " . $_SESSION["email"] . "<br>";
    //echo "Password: " . $_SESSION["password"] . "<br>";
    echo "Username: " . $_SESSION["username"] . "<br>";
    $conection = databaseConnection();


    $studentInfo = "SELECT Sid, Sdegree_plan, Sgpa, Sclassification, Scredits_earned FROM student WHERE Uemail = " ."'".  $_SESSION["email"]."'";
    //echo $sql;



    if($result = mysqli_query($conection, $studentInfo)){

        //we have successfully query the student based on email
        if(mysqli_num_rows($result) > 0){
            $user = mysqli_fetch_array($result);  
            $_SESSION["Sid"] = $user["Sid"];
            $_SESSION["SdegreePlan"] = $user["Sdegree_plan"];
            $_SESSION["Sgpa"] = $user["Sgpa"];
            $_SESSION["Sclassification"] = $user["Sclassification"];
            $_SESSION["ScreditsEarned"] = $user["Scredits_earned"];

        }
        else{
          //  echo"not found";
        Redirect('userNotFound.php', false);
        }
        
    }
    $conection->close();

?>
    

        <br/>

        <form action="viewCourses.php" action="">
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

        <form action="email.php" action="">
            <input name="email" type="submit" value="email" />
        </form>
        </fieldset>

        <center>
        <img src="uteplogo.png" width="50%"/>
        </center>

    </body>



</html>
