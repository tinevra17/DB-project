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


    function displayForm(){
        // $sql =" SELECT * FROM student WHERE Sid ='".   ."' ";
        $sql =" SELECT * FROM courses WHERE Sid = ".$_SESSION["studentID"] ."";

        //echo $sql;
        $conn = databaseConnection();
        $conn2 = databaseConnection();
        $result = mysqli_query($conn2, $sql); // First parameter is just return of "mysqli_connect()" function
        $result2 = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
            echo "<table  id='table2' border='1'>";

            // displays column names
            $row = mysqli_fetch_assoc($result); 
            foreach ($row as  $value) { // I you want you can right this line like this: foreach($row as $value) {
                echo "<td>" . $field . "</td>"; // I just did not use "htmlspecialchars()" function. 

            }
            echo "</tr>";

            //display information of the table
            while ($row = mysqli_fetch_assoc($result2)) { // Important line !!! Check summary get row on array ..

                foreach ($row as  $value) { // I you want you can right this line like this: foreach($row as $value) {
                    echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                echo "</tr>";
               
            }

        echo "</table>";
        echo "<br>";
    }

    if(isset($_GET['home'])){
        Redirect('homeAdvisor.php', false);
    }

    if(isset($_GET['approve'])){
        $conection = databaseConnection();


        $approve = "UPDATE appointment SET approve = 'Yes' WHERE Sid = " ."'".  $_SESSION["studentID"]."'";
        //echo $sql;
    
        if($result = mysqli_query($conection, $approve)){

            Redirect('email.php', false);
            //echo "approved";
    
            
        }
    
        $conection->close();

       // Redirect('homeAdvisor.php', false);
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



            Student Advising Form

            <?php
                displayForm();
            ?>

            <br>
            <form method = "get" action = "">
                <input type="submit"  name="approve" value="Approve Form">
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
