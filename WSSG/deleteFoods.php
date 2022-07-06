<?php
include "DB_Connection.php";

// DELETE FROM clientsorders WHERE cID=3;
// delete example!

// removal of records 
if(isset($_POST['fID']))
{
    
  function uppercase($data)
  {
    strtoupper($data);
    return $data;

  }
  $fID =upperCase($_POST['fID']);

        
    // Delete sql statement
    // Since the email is unique to only one user there wont be any 
    // duplicates within the database

    $delete =  "DELETE FROM foods 
                WHERE 
                fID = '$fID'";
                
      
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

