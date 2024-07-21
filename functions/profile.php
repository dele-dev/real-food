<?php
$dataLink = "single";
 
// include init file
include "./init.php";


if(isset($_POST)){

    saveEditProfile ($_POST,$conn);

}

function saveEditProfile ($data,$conn){

    // check that fields are not empty
    if(!checkEmpty ($data)){

        // print_r($data);

        // get all data sent by user
        $state = $data["state"];
        $city = $data["city"];
        $phone = $data["phone"];

        $user = $_SESSION["user_id"];


        // check that user had already set up profile 
        $sqlGetUser = "SELECT * FROM `profile_tbl` WHERE user_id = '".$user."'";
        
        $result = mysqli_query($conn,$sqlGetUser);
        
        $userData = (mysqli_num_rows($result) > 0) ? mysqli_fetch_all($result) : array();
        


        $sql_save = "INSERT INTO `profile_tbl`(`id`, `user_id`, `state`,
         `city`, `phone`, `created_at`, `status`, `deleted`) 
        value(null,'$user','$state','$city','$phone',now(),'0','0')";

        $sql_edit = "UPDATE `profile_tbl` SET `state`= '$state',`city` = '$city', `phone`= '$phone' 
        where `user_id` = '".$user."'  ";

        // save based on user existing profile details
        $sql =  (count($userData) > 0) ? $sql_edit : $sql_save ;

        

        if (mysqli_query($conn, $sql)) {
            (count($userData) > 0)  ? displayMessageAndReplaceLocation('Saved changes!','../index.php') : displayMessageAndReplaceLocation('Profile Updated!','./profile.php');
        } else {
            displayMessageAndReplaceLocation('Something Happened Please try again!','../profile.php');
        }
            
        mysqli_close($conn);


    }else{
        displayMessageAndReplaceLocation('Empty first found, please fill and try again !','../profile.php');
    }
    
    
}

function checkEmpty ($data){
      foreach($data as $d => $value){
         if(empty($data[$d])){
                echo $d;
            return true;
         }
      }

      return false;
}

function displayMessageAndReplaceLocation ($massage,$location) {

    echo "<script> alert('".$massage."');</script>";
    echo "<script> window.location.replace('".$location."');</script>";

}