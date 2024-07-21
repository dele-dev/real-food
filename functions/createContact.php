<?php

$dataLink = "single";


// include init file
include "./init.php";


if(isset($_POST)){

    addContact ($_POST,$conn);

}

function addContact ($data,$conn){

    // check that fields are not empty
    if(!checkEmpty ($data)){

        //  print_r($data);

        $username = $data["username"];
        $email = $data["email"];
        $phone = $data["phone"];
        $subject = $data["subject"];
        $message = $data["message"];


            $sql = "INSERT INTO `contact_tbl`(`id`, `fullname`, `email`, `phone`, `subject`, `message`, `created_at`, `status`, `deleted`)  
            value(null,'$username','$email','$phone','$subject','$message',now(),'0','0')";

            if (mysqli_query($conn, $sql)) {
                displayMessageAndReplaceLocation('Message sent successful!','../index.php');
            } else {
                displayMessageAndReplaceLocation('Something Happened Please try again!','../index.php');
            }
            
            mysqli_close($conn);



    }else{
        displayMessageAndReplaceLocation('Empty first found, please fill and try again !','../contact.php');
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