<?php

$dataLink = "single";


// include init file
include "./init.php";


if(isset($_POST)){

    saveNewSchedule ($_POST,$conn);

}

function saveNewSchedule ($data,$conn){

    // check that fields are not empty
    if(!checkEmpty ($data)){

        print_r($data);
        $foodseleted = $data["foodseleted"];
        $state = $data["state"];
        $city = $data["city"];
        $selecteddate = $data["selecteddate"];
        $schduletype = $data["schduletype"];
        $user = $_SESSION["user_id"];



            $sql = "INSERT INTO `schedule_tbl`(`id`, `food_id`, `user_id`, `type_schdule`,
             `date_it`, `state`, `city`, `created_at`, `status`, `deleted`) 
            value(null,'$foodseleted','$user','$schduletype','$selecteddate','$state','$city',now(),'0','0')";

            if (mysqli_query($conn, $sql)) {
                displayMessageAndReplaceLocation('Schedule made successful!','../index.php');
            } else {
                displayMessageAndReplaceLocation('Something Happened Please try again!','../schedule.php');
            }
            
            mysqli_close($conn);


    }else{
        displayMessageAndReplaceLocation('Empty first found, please fill and try again !','../schedule.php');
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