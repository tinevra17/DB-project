<?php
    session_start();
    include "config.php";
    echo "log in as " . $_SESSION["name"] ;
    //$sqls =" SELECT * FROM appointment";
    $conn = databaseConnection();

  

    if(isset($_GET['home'])){
        Redirect('homeStudent.php', false);
    }

    function Redirect($url){
        echo "<script>location.href=' ". $url  ." ';</script>";
        exit();
    }

    if(isset($_GET['email'])){
        $email = htmlentities($_GET['Aemail']);

        //echo $email;

    
      $sql ="CALL studentAppointments ('". $email ."')";
     

       //$sql =" SELECT * FROM appointment WHERE uemail =  'kreinovich@utep.edu'";
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
        while ($row = mysqli_fetch_assoc($results)) { // Important line !!! Check summary get row on array ..
    
            foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
            }
            echo "</tr>";
        }
        echo "</table>";

    }


    if(isset($_GET['add'])){

        $email = htmlentities($_GET['Aemail']);
        $location = htmlentities($_GET['Aoffice']);
        $date = htmlentities($_GET['date']);
        $time = htmlentities($_GET['time']);
        $approve = "No";

        // echo $crn;
        $sql = "INSERT INTO appointment ( alocation, adate, atime, approve, uemail) VALUES ( ". "'".$location."' , " . "'". $date . "'" . " , " . "'". $time."'"  . " , " . "'". $approve . "' , " . "'". $email ."')";

        // echo $sql;

        if ($conn->query($sql) === TRUE) {
            //echo "The course ". $Cname." was successfully added to your courses";
            Redirect('appointment.php', false);

         

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }



        $conn->close();


    }



            
?>

<html>

    <head>
        <title>CS Advising</title>
    </head>

    <body bgcolor="F5F5F5">        
        <fieldset>
            <legend><h2>Set Up Appointment</h2></legend>

            Who is your Advisor?
            <br>
            <form method = "get" action = "">
                <input id="textfield" name="Aemail" type="text" placeholder="Advisor Email" />
                <input type="submit"  name="email" value="look up Advisor Schedule">
            </form>



            Create an Appointement
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