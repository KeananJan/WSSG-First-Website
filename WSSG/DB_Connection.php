<?php

$host= "localhost";
$host_name= "root";
$password = "";
$database_name = "wssg";

$conn = mysqli_connect($host, $host_name, $password, $database_name);

if (!$conn) 

{	
	$message = die("Connection not completed!". mysqli_connect_error());
	echo"<script type='text/javascript'>console.log('$message');</script>";	
}
else
{
	$message ="Connection is successful";
	echo "<script type='text/javascript'>console.log('$message');</script>";

}

?>