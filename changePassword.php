<?php
    session_start();
    include "config.php";
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];

    echo "log in as " . $name ;
    echo "<br>";

    $newPassword = htmlentities($_GET['newPassword']);
    $confirmPassword = htmlentities($_GET['confirmPassword']);

    if($newPassword == $confirmPassword And $newPassword != ''){
        echo newPassword($newPassword,$email);
        
    }
    else if($newPassword == ''){

    }
    else{
        echo "The new password does not match";

    }


?>


<?php
  function newPassword($newPassword, $email){
    //setting up connection to db
    $conection = databaseConnection();
    $sql = "UPDATE user SET Upassword= '". $newPassword ."' WHERE Uemail= '" .$email."' ";

    //changing password
    if ($conection->query($sql) === TRUE) {
        echo "You have succesfully change your password!";

        //this needs review
       //Redirect('login.php', false);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conection->close();
    session_destroy();
  }

  function Redirect($url){
    echo "<script>location.href=' ". $url  ." ';</script>";
     exit();
 }

?>

<html>
    <body>        
        <form method = "get" action = "">
            New Password:<br/>
            <input type= "text" name = "newPassword"> <br/>

            Re-enter new Password:<br/>
            <input type= "text" name = "confirmPassword"> <br/>

            <input type="submit" name="submit" value="Submit"></input>
            <!-- <input type="submit" name="home" value="Home" action = "index.php" action = "post"></input> -->
        </form>

        <form action="homeStudent.php" method="get">
            <input type="submit" value="home">
        </form>

    </body>
</html>