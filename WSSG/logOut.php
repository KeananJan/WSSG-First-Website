<?php 
session_start();
include "DB_Connection.php";

session_unset();
session_destroy();

header("Location: loginForm.php");
?>