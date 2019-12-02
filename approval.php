<?php
    session_start();
    include "config.php";

    function displayStudentInfo(){
        $sql =" SELECT * FROM student WHERE Sid ='".  $_SESSION["studentID"]  ."' ";


        //echo $sql;
        $conn = databaseConnection();
        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
        $result2 = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
            echo "<table  id='table2' border='1'>";

            // displays column names
            $row = mysqli_fetch_assoc($result2); 
            foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                echo "<td>" . $field . "</td>"; // I just did not use "htmlspecialchars()" function. 

            }
            echo "</tr>";

          //  $result = mysqli_query($db,"SELECT * FROM members ORDER BY player_role DESC");
             

            


            //display information of the table
            while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..

                foreach ($row as  $value) { // I you want you can right this line like this: foreach($row as $value) {
                    echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                echo "</tr>";
               
            }

        echo "</table>";
        echo "<br>";
    }

    if(isset($_GET['home'])){
        Redirect('homeStudent.php', false);
    }

    function Redirect($url){  
        echo "<script>location.href=' ". $url  ." ';</script>";
        exit();
    }


?>


<html>

    <head>
        <title>CS Advising</title>
    </head>

    <body bgcolor="F5F5F5">        
        <fieldset>
            <legend><h2>Approval</h2></legend>

            Student Info
            <br>
            <!-- <form method = "get" action = "">
                <input id="textfield" name="Aemail" type="text" placeholder="Advisor Email" />
                <input type="submit"  name="email" value="look up Advisor Schedule">
            </form> -->

            <?php
                displayStudentInfo();
            ?>



            Courses
            <br>
            <form method = "get" action = "">
                <input id="textfield" name="Aemail" type="text" placeholder="Advisor Email" />
                <input id="textfield" name="Aoffice" type="text" placeholder="Advisor Office" />
                <input id="textfield" name="date" type="text" placeholder="Date" />
                <input id="textfield" name="time" type="text" placeholder="Time" />
                <input type="submit"  name="add" value="Create Appointment">
            </form>


            <form  method="get">
                <input type="submit" name = "home" value="home">
            </form>


        </fieldset>


        <center>
            <img src="uteplogo.png" width="50%"/>
        </center>


    </body>
</html>
