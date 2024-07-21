<?php

$dataLink = "single";


// include init file
include "./init.php";


if(isset($_POST)){

    addNewBlogComment ($_POST,$conn);

}

function addNewBlogComment ($data,$conn){

    // check that fields are not empty
    if(!checkEmpty ($data)){

        //  print_r($data);

        $message = $data["message"];
        $blog = $data["blog"];
        $user = $_SESSION["user_id"];


            $sql = "INSERT INTO `comment_tbl`(`id`, `blog_id`, `user_id`, `message`, `created_at`, `status`, `deleted`)   
            value(null,'$blog','$user','$message',now(),'0','0')";

            if (mysqli_query($conn, $sql)) {
                displayMessageAndReplaceLocation('Comment Posted successful!','../blog-details.php');
            } else {
                displayMessageAndReplaceLocation('Something Happened Please try again!','../blog-details.php');
            }
            
            mysqli_close($conn);



    }else{
        displayMessageAndReplaceLocation('Empty first found, please fill and try again !','../blog-details.php');
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