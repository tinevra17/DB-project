
<html>
    <head>
        <title>CS Advising</title>
    </head>

    <body bgcolor="F5F5F5">
        <fieldset>
        <legend><h2>Thank You!</h2></legend>
        <?php
            session_start();
            echo $_SESSION["name"] . ", you have succesfully logged out!";
            session_destroy();
        ?>

        <form action="index.php" method="get">
            <input type="submit" value="Home">
        </form>

        </fieldset>

        <center>
        <img src="uteplogo.png" width="50%"/>
        </center>


    </body>

</html>