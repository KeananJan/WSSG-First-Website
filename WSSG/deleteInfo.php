<?php
include "DB_Connection.php";

// DELETE FROM clientsorders WHERE cID=3;
// delete example!

// removal of records 
if(isset($_POST['email']))
{
    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        
        return $data;

    }
    $email = validation($_POST['email']);
    
    function upperCase($data)
    {
        // converts the first letter to uppercase
        $data = ucfirst($data);

        return $data;
    }
  $email =upperCase($_POST['email']);

        
    // Delete sql statement
    // Since the email is unique to only one user there wont be any 
    // duplicates within the database

    $delete =  "DELETE FROM adminusers 
                WHERE 
                aEmail = '$email'";
                // AND
                // aName ='$name'AND
                // aSurname='$surname'";
      
    if ($conn->query($delete) === TRUE) 
    {
        echo ("<script>alert('Record Was Removed!');</script>");
        echo("<script>window.location ='adminPage.php';</script>");
    } 
      else 
      {
        
        echo ("<script>alert('Record Not Removed!');</script>");
        echo("<script>window.location ='adminPage.php';</script>");
      }
   
}
?>

