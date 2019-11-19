<?php
include 'dbConnection.php';

$conn = OpenCon();

echo "Connected Successfully";

CloseCon($conn);

?>