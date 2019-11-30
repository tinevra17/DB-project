<?php
    session_start();
    include "config.php";


    if(isset($_GET['submit'])){
        //create a connection to the db
        $conection = databaseConnection();
        //get the username and password from the HTML form 
        $_SESSION["username"] = htmlentities($_GET['username']);
        $_SESSION["password"] = htmlentities($_GET['password']);



        // Formulate Query. 
        $query = "SELECT Username, Uemail, Fname, Lname FROM user WHERE Username = " ."'".     $_SESSION["username"]     ."'". " AND " . "Upassword = ". "'".$_SESSION["password"]."'";
    


        if($result = mysqli_query($conection, $query)){

            //we have successfully query the user based on password and username
            if(mysqli_num_rows($result) > 0){
                $user = mysqli_fetch_array($result);  
                $name = $user["Fname"] . " ". $user["Lname"];
                $_SESSION["email"] = $user["Uemail"];
                $_SESSION["name"] = $name;

                //checking if the user is a student or an advisor based on the size of the email after "@"
                $array = explode("@", $_SESSION["email"] );
                $strEmail =  $array[1];

                //student
                if(strlen($strEmail) > 12 ){
                    //echo "student";
                    Redirect('homeStudent.php', false);

                }
                //advisor
                else{
                   // echo "advisor";
                    Redirect('homeAdvisor.php', false);

                } 
            }
            else{
                // echo"not found";
                Redirect('userNotFound.php', false);
            }
            
        }
        $conection->close();
    }
   
    
    //redirects to another php file 
    function Redirect($url){
       echo "<script>location.href=' ". $url  ." ';</script>";
        exit();
    }
    session_destroy();
?>



<html>

    <body>
        <form method = "get" action = "">
            Username: <br/>
            <input type= "text" name = "username"> <br/>
            password<br/>
            <input type= "password" name = "password"> <br/>
            <input type="submit" name="submit" value="Log In"></input>
        </form>

        <form action="register.php" action="post">
            Not an user?  <br/>
            <input name="submit2" type="submit" value="register" />
        </form>

    </body>
</html>
