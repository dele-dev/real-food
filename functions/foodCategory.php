<?php

$dataLink = "single";


// include init file
include "./init.php";


if(isset($_POST)){

    saveNewCategory ($_POST,$conn);

}

function saveNewCategory ($data,$conn){

    // check that fields are not empty
    if(!checkEmpty ($data)){

        // print_r($data);
        $title = $data["title"];
        $description = $data["description"];


            $sql = "INSERT INTO `category_tbl`(`id`, `title`, `description`, `created_at`, `status`, `deleted`)  
            value(null,'$title','$description',now(),'0','0')";

            if (mysqli_query($conn, $sql)) {
                displayMessageAndReplaceLocation('Category  added successful!','../listFood.php');
            } else {
                displayMessageAndReplaceLocation('Something Happened Please try again!','../Auth/register.php');
            }
            
            mysqli_close($conn);



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