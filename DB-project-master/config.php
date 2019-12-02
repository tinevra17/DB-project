<?php
    //this method connects to the sql database
    function databaseConnection(){
        $dbhost = "ilinkserver.cs.utep.edu";
        $dbuser = "stinevra";
        $dbpass = "*utep2020!";
        $db = "f19_team4";

        $connection = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        
        if($connection === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        return $connection;
    }
    
?>
