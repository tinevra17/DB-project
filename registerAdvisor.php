
<!DOCTYPE html>
<?php
   include "config.php";

    if(isset($_GET['submit'])){
        $conection = databaseConnection();
        $email = htmlentities($_GET['email']);
        $username = htmlentities($_GET['username']);
        $password = htmlentities($_GET['password']);
        $name = htmlentities($_GET['name']);


        if($email != '' And $username != '' And $password != '' And $name!= '' ){
            //insert sql command
            $sql = "INSERT INTO user ( Uemail, Username, Upassword, Uname) VALUES ( ". "'".$email."' , " . "'". $username . "'" . " , " . "'". $password ."'"  . " , " . "'". $name . "')";
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
    Advisor registration.
    <br>
    <body>        
        <form method = "get" action = "">

            First Name:<br/>
            <input type= "text" name = "Fname"> <br/>
            Last Name:<br/>
            <input type= "text" name = "Lname"> <br/>
            Email:<br/>
            <input type= "text" name = "email"> <br/>
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
