
<!DOCTYPE html>
<?php
   include "config.php";

    if(isset($_GET['submit'])){
        $conection = databaseConnection();

        $id = htmlentities($_GET['iD']);
        $degreePlan = htmlentities($_GET['degreePlan']);
        $GPA = htmlentities($_GET['gpa']);
        $classification = htmlentities($_GET['classification']);
        $email = htmlentities($_GET['email']);
        $username = htmlentities($_GET['username']);
        $password = htmlentities($_GET['password']);
        $Fname = htmlentities($_GET['Fname']);
        $Lname = htmlentities($_GET['Lname']);


        if($email != '' And $username != '' And $password != '' And $Fname!= ''  And $Lname!= '' And $classification!= '' And $GPA!= '' And $degreePlan!= ''  And $id != ''){
            //insert sql command
            $sql = "INSERT INTO user ( Uemail, Username, Upassword, Fname, Lname) VALUES ( ". "'".$email."' , " . "'". $username . "'" . " , " . "'". $password ."'"  . " , " . "'". $Fname . "' , " . "'". $Lname ."')";
            //echo $sql;

            if ($conection->query($sql) === TRUE) {
                echo "Hello ". $name . ", you have succesfully register!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conection->close();

        }
        else{
            echo "empty fields, please fill out the form to register";

        } 
    }
   
?>

<?php
 function Query($url){
    echo "<script>location.href=' ". $url  ." ';</script>";
     exit();
 }

?>



<html>
    <br>
    Student registration
    <br>
    <body>        
        <form method = "get" action = "">

            First Name:<br/>
            <input type= "text" name = "Fname"> <br/>
            Last Name:<br/>
            <input type= "text" name = "Lname"> <br/>
            Email:<br/>
            <input type= "text" name = "email"> <br/>
            ID:<br/>
            <input type= "text" name = "iD"> <br/>
            Degree Plan:<br/>
            <input type= "text" name = "degreePlan"> <br/>
            GPA:<br/>
            <input type= "text" name = "gpa"> <br/>
            Classification:<br/>
            <input type= "text" name = "classification"> <br/>
            Username:<br/>
            <input type= "text" name = "username"> <br/>
            Password:<br/>
            <input type= "text" name = "password"> <br/>
            
            <input type="submit" name="submit" value="Submit"></input>

        </form>
        <br>
        
        <form action="login.php" method="get">
            <input type="submit" value="login">
        </form>
    </body>
</html>
