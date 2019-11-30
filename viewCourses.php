


<html>

    <head>
        <title>CS Advising</title>
    </head>
    <body bgcolor="F5F5F5">      
        <fieldset>
        <legend><h2>Upcoming Semester Courses</h2></legend>        
    
        <?php
        session_start();
        include "config.php";
        echo "Logged in as " . $_SESSION["name"] ;
        $sql =" SELECT * FROM f19_team4.courses";
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

        

        ?>


        <form action="index.php" method="get">
            <input type="submit" value="Home">

        </form>

        </fieldset>
        <center>
        <img src="uteplogo.png" width="50%"/>
        </center>

    </body>
</html>