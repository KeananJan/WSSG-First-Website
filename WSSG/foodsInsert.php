<?php
include "DB_Connection.php";

//  Admin user updating details 
if(isset($_POST['foodID']) && isset($_POST['fName']) && isset($_POST['fPrice']) && isset($_POST['catergoryID']))
{
    
    
    $foodID =$_POST['foodID'];
    $fPrice =$_POST['fPrice'];
    $catergoryID =$_POST['catergoryID'];

    

    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        
        return $data;

    }
    $fName = validation($_POST['fName']);
    
   
   
    function upperCase($data)
    {
        // converts the first letter to uppercase
        $data = ucfirst($data);

        return $data;
    }
    
    $fName = upperCase($_POST['fName']);
 
    

    // Update sql statement

    $insert = "INSERT INTO foods 
                 (fID , fName, fPrice,categoryID) 
                 VALUES 
                 ('$foodID','$fName','$fPrice','$catergoryID')";

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