<?php
    session_start();
    include "config.php";
   
    
    function displayName(){
        //$_SESSION["studentID"] =  htmlentities($_GET['sam']);
        echo "Logged in as " . $_SESSION["name"] . "<br>";
        echo "Email " . $_SESSION["email"];

    }
   
    function displayAppointments($sql){
        
        //echo $sql;
        $conn = databaseConnection();
        $conn2 = databaseConnection();
        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
        $result2 = mysqli_query($conn2, $sql);
            echo "<table  id='table2' border='1'>";

            //displays column names
            $row = mysqli_fetch_assoc($result); 
            foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                echo "<td>" . $field . "</td>"; // I just did not use "htmlspecialchars()" function. 

            }
            echo "</tr>";


            //display information of the table
            while ($row = mysqli_fetch_assoc($result2)) { // Important line !!! Check summary get row on array ..

                foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
                    echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
                }
                echo "</tr>";
            }

        echo "</table>";
    }



    function Redirect($url){  
        echo "<script>location.href=' ". $url  ." ';</script>";
        exit();
    }

    if(isset($_GET['lol'])){
        $_SESSION["studentID"] =  htmlentities($_GET['sacha']);
        //echo $_SESSION["studentID"];
        echo "id " . $_SESSION["studentID"];
        Redirect('approval.php', false);
    }

    

?>


<html>
    <head>
        <title>CS Advising</title>
    </head>

    <body bgcolor="F5F5F5">


      
        

        <fieldset>
            <legend><h2>Advisor Home</h2></legend>
            <?php
                displayName();
            ?>

            <legend><h2>Appointments</h2></legend>

            <form method="post" action="">
                    <input name="viewCourses" type="submit" value="Search Appointments" />
                  
                    <form action = "" action>
                        <select name = "options">
                            <option value="GPA">GPA</option>
                            <option value="Classification">Classification</option>
                            <option value="status">Advising status</option>
                            <option value="Advisor">Advisor</option>
                        </select>
                        <input id="textfield" name="Ainput" type="text" placeholder="Enter value" />
                    </form
            </form>

       


            <?php
            

                if(isset($_POST['options'])){
                    // $_SESSION["studentID"] =  htmlentities($_GET['sacha']);
                    //echo $_SESSION["studentID"];
                    //echo $_POST['options'];
                    // echo 
                    if($_POST['options'] == "GPA" AND $_POST['Ainput'] != ""){
                        $sql = "CALL gpaReport('". $_POST['Ainput'] ."')";
                        echo $sql;
            
                        displayAppointments($sql);    
            
                    }
                    elseif($_POST['options'] == "Classification" AND $_POST['Ainput'] != ""){

                        $sql = "CALL classReport('". $_POST['Ainput'] ."')";
            
                        displayAppointments($sql);    
            
                    }
                    elseif($_POST['options'] == "status" AND $_POST['Ainput'] != ""){
                    
            
                        $sql = "CALL studentsApproved('". $_POST['Ainput'] ."')";
            
                        displayAppointments($sql);    
                        
                    }
                    elseif($_POST['options'] == "Advisor" AND $_POST['Ainput'] != ""){
            
                        displayAppointments($sql);    
                        
                    }
                    else{
                        $sql =" SELECT * FROM appointment WHERE uemail ='".  $_SESSION["email"]  ."' ";
                        displayAppointments($sql); 

                    }
            
                 
           
                }

            ?>




            <br/>
   
            
                
            <form  method="get">
                    ID:<input type="text" name="sacha" id="id">
                    <input name="lol" type="submit" value="Display student form" input>
               
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


    <body>
        <script>
    
                var table = document.getElementById('table2');
                
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         //rIndex = this.rowIndex;
                         document.getElementById("id").value = this.cells[5].innerHTML;
                        //  document.getElementById("id").value = this.cells[1].innerHTML;
                        //  document.getElementById("age").value = this.cells[2].innerHTML;
                    };
                }
    
         </script>
        
    </body> 

</html>
