<?php
include "DB_Connection.php";

//  Admin user updating details 
if(isset($_POST['phone']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password']))
{
    // $id =$_SESSION['a_id'];
    // echo"<script type='text/javascript'>alert('$id');</script>";

    function validation($data)
    {
        // remove the spaces at the begining and end of the line = trim();
        $data = trim($data);
        
        return $data;

    }
    $phone = validation($_POST['phone']);
    $name = validation($_POST['name']);
    $email = validation($_POST['email']);
    $password = validation($_POST['password']);
    $surname = validation($_POST['surname']);

    function passwordEncryption($data)
    {
        // encrypts the password 
        $data = md5($data);
        return $data;
    }
    $password = passwordEncryption($_POST['password']);
   

    function upperCase($data)
    {
        // converts the first letter to uppercase
        $data = ucfirst($data);

        return $data;
    }
    
    $name = upperCase($_POST['name']);
    $email =upperCase($_POST['email']);
    $surname =upperCase($_POST['surname']);

    // Update sql statement

    $insert = "INSERT INTO adminusers 
                 (aName, aSurname, aPhone, aEmail,aPassword) 
                 VALUES 
                 ('$name','$surname','$phone','$email','$password')";

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