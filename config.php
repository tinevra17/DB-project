<?php

     function OpenCon(){
        $dbhost = "ilinkserver.cs.utep.edu";
        $dbuser = "stinevra";
        $dbpass = "*utep2020!";
        $db = "stinevra_db";

        $link = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        return $conn;
     }
    
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    ?>
   


?>