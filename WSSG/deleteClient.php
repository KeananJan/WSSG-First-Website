<?php
session_start();
include "DB_Connection.php";

if(isset($_POST['choice']) )
{

$id = $_SESSION['cID'];

// removal of records 

function validation($data)
{
    // remove the spaces at the begining and end of the line = trim();
    $data = trim($data);
    
    return $data;

}
$test  = validation($_POST['choice']);

function upperCase($data)
{
    // converts the first letter to uppercase
    $data = ucfirst($data);

    return $data;
}
$test =upperCase($_POST['choice']);



if(($test) =='Yes')
    
{     
    // Delete sql statement
    // Since the cID is unique to only one user there wont be any 
    // duplicates within the database

    $delete =  "DELETE FROM clients 
                WHERE 
                cID = '$id'";
                
      
    if ($conn->query($delete) === TRUE) 
    {
        echo ("<script>alert('Record Was Removed!');</script>");
        echo("<script>window.location ='logOut.php';</script>");
    }   
   
}
else if(($test) =='No')
{
  echo ("<script>alert('Record Not Removed!');</script>");
  echo("<script>window.location ='userAccount.php';</script>");
}
}

else
{
    echo("<script>alert('Incorrect option entered!');</script>");
    echo("<script>window.location ='userAccount.php';</script>");

}
?>



