<?php

    session_start();
    echo "User not found"; // Your code here
    session_destroy();
    
?>

<html>
    <body>        

        <form action="login.php" method="get">
            <input type="submit" value="login">
        </form>

    </body>
</html>