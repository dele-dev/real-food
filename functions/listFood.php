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


        $targetDir = "../uploads/";
        $selectedfile = basename($_FILES["image"]["name"]) ;
        $target_file = $targetDir . $selectedfile;
        $uploadOk = 1;

        
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            displayMessageAndReplaceLocation('Sorry, your file is too large!','../listFood.php');
            $uploadOk = 0;
        }

                
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            displayMessageAndReplaceLocation('Sorry, your file was not uploaded!','../listFood.php');
        // if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

            // print_r($data);
            $foodcategory = $data["foodcategory"];
            $title = $data["title"];
            $state = $data["state"];
            $city = $data["city"];
            $quantity = $data["quantity"];
            $expdate = $data["expdate"];
            $description = $data["description"];
            $schduletype = $data["schduletype"];
            $fromdate = $data["fromdate"];
            $todate = $data["todate"];
            $image = $selectedfile;
            $user_id = $_SESSION["user_id"];



            $sql = "INSERT INTO `food_listing_tbl`(`id`, `category_id`, `user_id`, `title`, `state`,
             `city`, `quantity`, `image`, `exp_date`, `schduletype`, `schduledateFrom`, `schduledateto`,
              `description`, `created_at`, `status`, `deleted`)
            value(null,'$foodcategory','$user_id','$title','$state','$city','$quantity','$image','$expdate'
            ,'$schduletype','$fromdate','$todate','$description',now(),'0','0')";

            if (mysqli_query($conn, $sql)) {
                displayMessageAndReplaceLocation('Food Listed successful!','../findFood.php');
            } else {
                displayMessageAndReplaceLocation('Something Happened Please try again!','../listFood.php');
            }
            
            mysqli_close($conn);

   
        } else {
          displayMessageAndReplaceLocation('Sorry, there was an error uploading your file!','../listFood.php');
          
        }
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