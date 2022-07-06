<?php
session_start();
include "DB_Connection.php";

//  Admin user updating details 
if(isset($_POST['bName']) && isset($_POST['cardNum']) && isset($_POST['bType']) && isset($_POST['ccvNum']) )
{
     $id =$_SESSION['cID'];
    // echo"<script type='text/javascript'>alert('$id');</script>";

    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        
        return $data;

    }
    $bName = validation($_POST['bName']);
    $cardNum = validation($_POST['cardNum']);
    $bType = validation($_POST['bType']);
    $ccvNum = validation($_POST['ccvNum']);

   

    function upperCase($data)
    {
        // converts the first letter to uppercase
        $data = ucfirst($data);

        return $data;
    }
    
    $bName = validation($_POST['bName']);
    $bType = validation($_POST['bType']);

    // Update sql statement

    $insert = "INSERT INTO banking 
                 (cID ,bName, bType, ccv, cardNum) 
                 VALUES 
                 ('$id','$bName','$bType','$ccvNum','$cardNum')";

    if ($conn->query($insert) === TRUE) 
    {
        echo ("<script>alert('Record Inserted!');</script>");
        echo("<script>window.location ='userAccount.php';</script>");
    } 
      else 
      {
        
        echo ("<script>alert('Record Not Inserted!');</script>");
        echo("<script>window.location ='userAccount.php';</script>");
      }
   
}
else
{
    echo ("<script>alert(' Few fields are Missing!');</script>");
    echo("<script>window.location ='adminPage.php';</script>");
}

?>