<?php

$dataLink = "single";


// include init file
include "./init.php";


if(isset($_POST)){

    addNewFoodReview ($_POST,$conn);

}

function addNewFoodReview ($data,$conn){

    // check that fields are not empty
    if(!checkEmpty ($data)){

        //  print_r($data);

        $foodseleted = $data["foodseleted"];
        $message = $data["message"];
        $rate = $data["rate"];
        $user = $_SESSION["user_id"];


            $sql = "INSERT INTO `feedback_tbl`(`id`, `food_id`, `user_id`, `subject`, `message`, `created_at`, `status`, `deleted`)   
            value(null,'$foodseleted','$user','$rate','$message',now(),'0','0')";

            if (mysqli_query($conn, $sql)) {
                displayMessageAndReplaceLocation('Review Posted successful!','../findFood.php');
            } else {
                displayMessageAndReplaceLocation('Something Happened Please try again!','../findFood.php');
            }
            
            mysqli_close($conn);



    }else{
        displayMessageAndReplaceLocation('Empty first found, please fill and try again !','../findFood.php');
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