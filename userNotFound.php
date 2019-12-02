<?php
            session_start();
            echo "User not found"; // Your code here
            session_destroy();
        ?>
<html>
    <head>
        <title>CS Advising</title>
    </head>    
    <body bgcolor="F5F5F5">    
        <fieldset>
        <legend><h2>Error</h2></legend>
 

        <form action="index.php" method="get">
            <input type="submit" value="Home">
        </form>
        </fieldset>
        <center>
        <img src="uteplogo.png" width="50%"/>
        </center>

    </body>
</html>