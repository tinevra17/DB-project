<?php
    session_start();
    echo $_SESSION["name"] . " you have succesfully logOut!";
    session_destroy();
?>
<html>
    <form action="index.php" method="get">
        <input type="submit" value="login">
    </form>

</html>