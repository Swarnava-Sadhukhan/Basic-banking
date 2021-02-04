<?php

//remote database
$host = "remotemysql.com";
$username = "OrZPGCAbbJ";
$pass = "Rju0CUo115";
$db="OrZPGCAbbJ";

$con = mysqli_connect($host, $username, $pass, $db);
mysqli_select_db($con,$db) or die ('Cannot found database');

?>