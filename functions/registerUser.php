<?php

$dataLink = "single";


// include init file
include "./init.php";


if(isset($_POST)){

    saveNewUser ($_POST,$conn);

}

function saveNewUser ($data,$conn){

    // check that fields are not empty
    if(!checkEmpty ($data)){

        // print_r($data);
        $name = $data["name"];
        $email = $data["email"];
        $usertype = $data["usertype"];
        $password = $data["password"];
        $confirmpassword = $data["confirmpassword"];

        // check that password and confirm Password is the same
        if ($password == $confirmpassword) {

            $sql = "INSERT INTO `user_tbl`(`id`, `fullname`, `email`, `password`, 
            `status`, `created_at`, `deleted`, `user_type`) 
            value(null,'$name','$email','$password',now(),'0','0','$usertype')";

            if (mysqli_query($conn, $sql)) {
                displayMessageAndReplaceLocation('Registration successful!','../Auth');
            } else {
                displayMessageAndReplaceLocation('Something Happened Please try again!','../Auth/register.php');
            }
            
            mysqli_close($conn);


        }else {
            displayMessageAndReplaceLocation('Password and Confirm Password not match! Please Try again.','../Auth');
        }

    }else{
        displayMessageAndReplaceLocation('Empty first found, please fill and try again !','../Auth/register.php');
    }
    
    
}

function checkEmpty ($data){
      foreach($data as $d => $value){
         if(empty($data[$d])){
            return true;
         }
      }

      return false;
}

function displayMessageAndReplaceLocation ($massage,$location) {

    echo "<script> alert('".$massage."');</script>";
    echo "<script> window.location.replace('".$location."');</script>";

}