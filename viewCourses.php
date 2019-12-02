<?php
        session_start();
        include "config.php";
        echo "Logged in as " . $_SESSION["name"] . "<br>";
        echo "id: " . $_SESSION["Sid"] . "<br>";
        $sql =" SELECT * FROM courses WHERE Sid = ".$_SESSION["Sid"] ."";
        $conn = databaseConnection();
        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
     
        echo "<br>";
        echo "<br>";
    


        echo "<table border='1'>";

        //displays column names
        $row = mysqli_fetch_assoc($result); 
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
            Redirect('homeStudent.php', false);
        }

        function Redirect($url){
            echo "<script>location.href=' ". $url  ." ';</script>";
            exit();
        }



    if(isset($_GET['add'])){
        $Ccrn = htmlentities($_GET['Crn']);
        $Cnumber = htmlentities($_GET['Cnumber']);
        $Cname = htmlentities($_GET['Cname']);
        $Cterm = htmlentities($_GET['Cterm']);
        $Sid = $_SESSION["Sid"] ;
        // echo $crn;
        $sql = "INSERT INTO courses ( Sid, Ccrn, Cnumber, Cname, Cterm) VALUES ( ". "'".$Sid."' , " . "'". $Ccrn . "'" . " , " . "'". $Cnumber."'"  . " , " . "'". $Cname . "' , " . "'". $Cterm ."')";

        // echo $sql;

        if ($conn->query($sql) === TRUE) {
            echo "The course ". $Cname." was successfully added to your courses";
            Redirect('viewCourses.php', false);

         

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }



        $conn->close();
    }


    if(isset($_GET['drop'])){

        $Ccrn = htmlentities($_GET['dropCrn']);

       // echo $Ccrn;

       $sql = "DELETE FROM courses WHERE Ccrn =" . $Ccrn.  "";

        if ($conn->query($sql) === TRUE) {
            echo "The course ". "" ." was successfully deleted to your courses";
            Redirect('viewCourses.php', false);

         

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<html>

    <head>
        <title>CS Advising</title>
    </head>
    <body bgcolor="F5F5F5">      
        <fieldset>
            <legend><h2>Upcoming Semester Courses</h2></legend>    
            
            <form>
                <a class="btn btn-success" href="http://catalog.utep.edu/undergrad/course-descriptions/cs/" target="_blank">Courses Catalog</a>
            </form>
        


          
            Add Course
            <br>
            <form method = "get" action = "">
                <input id="textfield" name="Crn" type="text" placeholder="Course CRN" />
                <input id="textfield" name="Cnumber" type="text" placeholder="Course number" />
                <input id="textfield" name="Cname" type="text" placeholder="Course name" />
                <input id="textfield" name="Cterm" type="text" placeholder="Course term" />
                <input type="submit"  name="add" value="Add course">
            </form>

<<<<<<< HEAD
        <form action="homeStudent.php" method="get">
            <input type="submit" value="Home">
=======
>>>>>>> samuel

            Drop Course
            <br>
            <form method = "get" action = "">
                <input id="textfield" name="dropCrn" type="text" placeholder="Course CRN" />
                <input type="submit"  name="drop" value="Drop course">
    
            </form>

            

        </fieldset>
    <body>

    <form  method="get">
        <input type="submit"  name="home" value="Home">
    </form>



    </body>
        <center>
        <img src="uteplogo.png" width="50%"/>
        </center>
    </body>
  

    
</html>

