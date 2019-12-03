<?php
   session_start();

   function Redirect($url){
        echo "<script>location.href=' ". $url  ." ';</script>";
        exit();
    }

    


if(isset($_GET['home'])){
    Redirect('homeAdvisor.php', false);
}

if(isset($_GET['sorry'])){

    // $name = $_GET['name'];
    // $email = $_POST['email'];
    // $email = "samueltinevra@gmail.com";
    // $phone = $_POST['phone'];
    // $message = $_POST['message'];
    // $formcontent=" From: $name \n Message: $message";
    // $recipient = $_SESSION["email"];
    $subject = "Advising";
    // $mailheader = "From: $email \r\n";

    // $email = "samueltinevra@gmail.com";
    // $to = "tinevra17@hotmail.com";
    // $message = "lol";
    // $subject = "Advising";
    // mail($to,$subject,$message);
    //mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");

    $msg = $_POST['message'];
   

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,70);

    // send email
    mail($_SESSION["email"],$subject,$msg);


    //echo $name;
    // Redirect('homeAdvisor.php', false);
}
    
?>

<html>
<head>
	<title>PHP form to email sample form</title>
<!-- define some style elements-->
<style>
label,a 
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px; 
}

</style>	
<!-- a helper script for vaidating the form-->
<script language="JavaScript" src="scripts/gen_validatorv31.js" type="text/javascript"></script>
</head>


<body>

<!-- Start code for the form-->

<form method = "post">

</form>
    
   
    
    <form  method="get">

    <p>
		<label for='name'>Enter Name: </label><br>
		<input type="text" name="name">
	</p>
	<p>
		<label for='email'>Enter Email Address:</label><br>
		<input type="text" name="email">
	</p>
	<p>
		<label for='message'>Enter Message:</label> <br>
		<textarea name="message"></textarea>
    </p>
                <input type="submit" name = "home" value="home">
                <input type="submit" name='sorry' value="Submit">
    </form>


<script language="JavaScript">
// Code for validating the form
// Visit http://www.javascript-coder.com/html-form/javascript-form-validation.phtml
// for details
var frmvalidator  = new Validator("myemailform");
frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>
</body>
</html>