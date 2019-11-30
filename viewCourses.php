<?php
    session_start();
    include "config.php";
    echo "log in as " . $_SESSION["name"] ;
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


<html>
    <body>        

        <form action="homeStudent.php" method="get">
            <input type="submit" value="home">
        </form>

    </body>
</html>