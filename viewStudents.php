<?php
        session_start();
        include "config.php";
        echo "Logged in as " . $_SESSION["name"] ;
        $sql =" SELECT * FROM f19_team4.student";
        $conn = databaseConnection();
        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
        $results = mysqli_query($conn, $sql); 
        echo "<br>";
        echo "<br>";
    


        echo "<table border='1'>";

        //displays column names
        $row = mysqli_fetch_assoc($results); 
        foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
            echo "<td>" . $field . "</td>"; // I just did not use "htmlspecialchars()" function. 

        }
        echo "</tr>";


        //display information of the table
        while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..

            foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
            }
            echo "</tr>";
        }
        echo "</table>";


        if(isset($_GET['home'])){
            Redirect('homeAdvisor.php', false);
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
        <legend><h2>Upcoming Semester Courses</h2></legend>        
    



        <form  method="get">
            <input type="submit" name = "home" value="Home">

        </form>

        <form action="logout.php" action="">
            <input name="logOut" type="submit" value="add courses" />
        </form>

        </fieldset>
        <center>
        <img src="uteplogo.png" width="50%"/>
        </center>

    </body>
</html>