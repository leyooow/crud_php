<?php
session_start();
require 'db_connection.php';


if(isset($_POST['delete_btn'])){

    $user_id = mysqli_real_escape_string($conn, $_POST['delete_btn']);

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "Added";
        header("Location: index.php", TRUE, 301);
        exit(0);
    }

}


if(isset($_POST['save_edit'])) {


    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $cellNumber = mysqli_real_escape_string($conn, $_POST['cellNumber']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE users SET firstName='$firstName', lastName='$lastName', cellNumber='$cellNumber', 
    address='$address', email='$email' WHERE id = '$user_id' ";

    $query_run = mysqli_query($conn, $query);

    if($query_run){
        $_SESSION['message'] = "Added";
        header("Location: index.php", TRUE, 301);
        exit(0);
       
    }

}



 if (isset($_POST['submit'])) {
    include "db_connection.php";
    

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        
    }

    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $cellNumber = validate($_POST['cellNumber']);
    $address = validate($_POST['address']);
    $email = validate($_POST['email']);

    $sql = "INSERT INTO users(firstName, lastName, cellNumber, address, email)
    VALUES('".ucfirst($firstName)."', '".ucfirst($lastName)."', '$cellNumber', '$address', '$email')";

    $result = mysqli_query($conn, $sql);
    if($result){    
       
        $_SESSION['message'] = "Added";
        header("Location: index.php", TRUE, 301);
        exit(0);
       
    }else{
        $_SESSION['message'] = "Failed to add";
        header("Location: index.php", TRUE, 301);
        exit(0);
    }
    
 }

?>