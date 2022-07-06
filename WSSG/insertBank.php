<?php
session_start();
include "DB_Connection.php";

$id = $_SESSION['cID'];

//  Admin user updating details 
if(isset($_POST['bName']) && isset($_POST['cardNum']) && isset($_POST['ccv']) && isset($_POST['bType']))
{
    // $id =$_SESSION['a_id'];
    // echo"<script type='text/javascript'>alert('$id');</script>";

    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        
        return $data;

    }

    $bName = validation($_POST['phone']);
    $cardNum = validation($_POST['name']);
    $ccv = validation($_POST['email']);
    $bType = validation($_POST['password']);
   
    function upperCase($data)
    {
        // converts the first letter to uppercase
        $data = ucfirst($data);

        return $data;
    }
    
 
    $bName = upperCase($_POST['phone']);  
    $bType = upperCase($_POST['password']);

    // Update sql statement

    $insert = "INSERT INTO banking 
                 (cID ,bName, bType, aPhone, ccv, cardNum) 
                 VALUES 
                 ('$id','$bName','$bType','$ccv','$cardNum')";

    if ($conn->query($insert) === TRUE) 
    {
        echo ("<script>alert('Record Inserted!');</script>");
        echo("<script>window.location ='adminPage.php';</script>");
    } 
      else 
      {
        
        echo ("<script>alert('Record Not Inserted!');</script>");
        echo("<script>window.location ='adminPage.php';</script>");
      }
   
}
else
{
    echo ("<script>alert(' Few fields are Missing!');</script>");
    echo("<script>window.location ='adminPage.php';</script>");
}

?>