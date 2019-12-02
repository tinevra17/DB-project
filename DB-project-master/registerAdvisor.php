
<!DOCTYPE html>
<html>
    <head>
        <title>CS Advising</title>
    </head>    
    <body bgcolor="F5F5F5">       
        <fieldset> 
        <legend><h2>Register for an Account</h2></legend>

        <?php
        include "config.php";

            if(isset($_GET['submit'])){
                $conection = databaseConnection();
                $email = htmlentities($_GET['email']);
                $username = htmlentities($_GET['username']);
                $password = htmlentities($_GET['password']);
                $Fname =  htmlentities($_GET['Fname']);
                $Lname =  htmlentities($_GET['Lname']);
                $name =  $Fname . " " . $Lname;


                if($email != '' And $username != '' And $password != '' And $Fname!= '' And $Lname!= ''){
                    //insert sql command
                    $sql = "INSERT INTO user ( Uemail, Username, Upassword, Fname, Lname) VALUES ( ". "'".$email."' , " . "'". $username . "'" . " , " . "'". $password ."'"  . " , " . "'". $Fname . "' , " . "'". $Lname ."')";
                    $updateAdvisor = "INSERT INTO advisor (Uemail) VALUES ( ". "'".$email."" .  "')";
                    //echo $updateAdviosr;
                    // $string = " INSERT INTO advisor (`Uemail`) VALUES ('s')";

                    // if ($conection->query($string) === TRUE) {
                    //     echo "Hello ". $string . ", you have succesfully register!";
                                        
                    // } else {
                    //     echo "fic";
                    // }

                    if ($conection->query($sql) === TRUE) {
                        // echo "Hello ". $name . ", you have succesfully register!";

                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }


                    if ($conection->query($updateAdvisor) === TRUE) {
                        echo "Hello ". $name . ", you have succesfully register!";



                        
                    } else {
                        echo "Error: " . $string . "<br>" . $conn->error;
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

            //redirects to another php file 
            function Redirect($url){
                echo "<script>location.href=' ". $url  ." ';</script>";
                    exit();
            }
            

        ?> 
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

        <form action="index.php" action="">
            <input name="logOut" type="submit" value="Home" />
        </form>


        <br>
        </fieldset>
        <center>
        <img src="uteplogo.png" width="50%"/>
        </center>
    </body>
</html>
